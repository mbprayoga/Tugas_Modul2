@extends('pakaian.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Pakaian</h5>
        <form method="post" action="{{route('pakaian.store')}}">
            @csrf
            <div class="mb-3">
                <label for="ID_Pakaian" class="form-label">ID Pakaian</label>
                <input type="text" class="form-control" id="ID_Pakaian" name="ID_Pakaian">
            </div>
            <div class="mb-3">
                <label for="Brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="Brand" name="Brand">
            </div>
            <div class="mb-3">
                <label for="Kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="Kategori" name="Kategori">
            </div>
            <div class="mb-3">
                <label for="Harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="Harga" name="Harga">
            </div>
            <div class="mb-3">
                <label for="Ukuran" class="form-label">Ukuran</label>
                <input type="text" class="form-control" id="Ukuran" name="Ukuran">
            </div>
            <div class="mb-3">
                <label for="Warna" class="form-label">Warna</label>
                <input type="text" class="form-control" id="Warna" name="Warna">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop
