@extends('transaksi.layout')
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
        <h5 class="card-title fw-bolder mb-3">Tambah Transaksi</h5>
        <form method="post" action="{{ route('transaksi.store', ['id' => $id]) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            
            <div class="mb-3">
                <label for="Metode_Pembayaran" class="form-label">Metode_Pembayaran</label>
                <input type="text" class="form-control" id="Metode_Pembayaran" name="Metode_Pembayaran">
            </div>
            <div class="mb-3">
                <label for="Tanggal_Transaksi" class="form-label">Tanggal_Transaksi</label>
                <input type="text" class="form-control" id="Tanggal_Transaksi" name="Tanggal_Transaksi">
            </div>
            <div class="mb-3">
                <label for="Total_Harga" class="form-label">Total_Harga</label>
                <input type="text" class="form-control" id="Total_Harga" name="Total_Harga">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop
