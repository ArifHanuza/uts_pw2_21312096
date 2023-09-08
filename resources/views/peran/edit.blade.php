@extends('layout.master')

	@section('judul')
    Edit peran
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
    <form method="post" action="/peran/{{ $peran->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Film</label>
            <input type="text" name="nama" value="{{ $peran->film }}" class="form-control">
</div>
@error('film')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>Cast</label>
            <input type="text" name="cast" value="{{ $peran->cast }}" class="form-control">
</div>
@error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>nama</label>
            <textarea class="form-control" name="nama">{{ $peran->nama }} </textarea>
</div>
@error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection