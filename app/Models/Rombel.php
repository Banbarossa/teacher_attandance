<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rombel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'id',
        'nama_rombel',
        'tingkat_kelas',
        'jenjang',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
