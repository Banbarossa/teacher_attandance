<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
        ]);

        User::findOrFail(auth()->user()->id)
            ->update([
                'name' => $request->name,
            ]);

        return redirect()->back()->with('success', 'data berhasil di ubah');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();
        $currentPassword = $request->old_password;
        $newPassword = $request->password;

        if (Hash::check($currentPassword, $user->password)) {
            if (Hash::check($newPassword, $user->password)) {
                return redirect()->back()->with('error', 'New password must be different from the current password.');
            }

            User::findOrFail(auth()->user()->id)
                ->update(
                    [
                        'password' => Hash::make($newPassword),
                    ]
                );

            return redirect()->back()->with('success', 'Password updated successfully!');
        }

        return redirect()->back()->with('error', 'Current password is incorrect.');
    }
}
