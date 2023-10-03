@extends('pakaian.layout')

@section('content')

<h4 class="mt-5">Data Pakaian</h4>

<a href="{{ route('pakaian.create') }}" type="button" class="btn btn-success rounded-3">Tambah Pakaian</a>


@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<form action="{{ route('pakaian.search') }}" method="GET" class="mb-3">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" name="query" placeholder="Cari transaksi...">
        <div class="input-group-append">
            <button type="submit" class="btn btn-success">Cari</button>
        </div>
    </div>
</form>

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Kategori</th>
            <th>Ukuran</th>
            <th>Warna</th>
            <th>Action</th>
            <th>Tanggal transaksi</th>
            <th>Harga</th>
            <th>Metode Pembayaran</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->ID_Pakaian }}</td>
            <td>{{ $data->Brand }}</td>
            <td>{{ $data->Kategori }}</td>
            <td>{{ $data->Ukuran }}</td>
            <td>{{ $data->Warna }}</td>
            <td>
                <a href="{{ route('pakaian.edit', optional($data)->ID_Pakaian) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                @if($data->ID_Pakaian && !$data->ID_Transaksi) <!-- Check if ID_Transaksi is null or empty -->
                    <a href="{{ route('transaksi.create', optional($data)->ID_Pakaian) }}" type="button" 
                    class="btn btn-success rounded-3">Tambah Transaksi</a>
                @endif
            </td>
            <td>
                @if(isset($data->Tanggal_Transaksi))
                    {{ $data->Tanggal_Transaksi }}
                @else
                    N/A
                @endif
            </td>
            <td>
                @if(isset($data->Total_Harga))
                    {{ $data->Total_Harga }}
                @else
                    N/A
                @endif
            </td>
            <td>
                @if(isset($data->Metode_Pembayaran))
                    {{ $data->Metode_Pembayaran }}
                @else
                    N/A
                @endif
            </td>
            <td>
                @if($data->ID_P)
                    <a href="{{ route('transaksi.edit', optional($data)->ID_Transaksi) }}" type="button"
                        class="btn btn-warning rounded-3">Ubah</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
