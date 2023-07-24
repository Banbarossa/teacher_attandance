<div>

    @if(isset($route['show']))
        <a href="{{ $route['show'] }}" class="btn btn-warning">Cetak</a>

    @endif

    {{-- @if($route['show'])
    @endif --}}

    <a href="{{ $route['edit'] }}" class="btn btn-warning">Edit</a>
    <form action="{{ $route['delete'] }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah yakin dihapus?')">Hapus</button>
    </form>
</div>
