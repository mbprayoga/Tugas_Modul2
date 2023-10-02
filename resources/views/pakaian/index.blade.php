@extends('pakaian.layout')

@section('content')

<h4 class="mt-5">Data Pakaian</h4>

<a href="{{ route('pakaian.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Brand.</th>
            <th>Kategori</th>
            <th>Ukuran</th>
            <th>Warna</th>
            <th>Tanggal transaksi</th>
            <th>Harga</th>
            <th>Metode Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->Brand }}</td>
            <td>{{ $data->Kategori }}</td>
            <td>{{ $data->Ukuran }}</td>
            <td>{{ $data->Warna }}</td>
            <td>{{ $data->Tanggal_Transaksi }}</td>
            <td>{{ $data->Harga }}</td>
            <td>{{ $data->Metode_Pembayaran }}</td>
            <td>
                <a href="{{ route('pakaian.edit', $data->ID_Pakaian) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
