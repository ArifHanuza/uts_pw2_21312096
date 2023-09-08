@extends('layout.master')

	@section('judul')
    Tambah peran
    @endsection

    
@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
    $(function(){
        $('#example1').DataTable();
    });
</script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

	@section('content')
    <form method="post" action="/peran">
        @csrf
        <div class="form-group">
            <label>Film</label>
            <input type="text" name="nama" value="" class="form-control">
        </div>

        <div class="form-group">
            <label>Cast</label>
            <input type="text" name="umur" value="" class="form-control">
        </div>

        <div class="form-group">
            <label>Nama</label>
            <textarea class="form-control" name="bio"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection