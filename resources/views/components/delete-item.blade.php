<div>

    <a href="{{$route['edit']}}" class="btn btn-warning">Edit</a>
    <form action="{{$route['delete']}}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah yakin dihapus?')">Hapus</button>
    </form>
</div>