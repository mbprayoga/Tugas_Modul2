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
            <th>Harga</th>
            <th>Kategori</th>
            <th>Ukuran</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_admin }}</td>
            <td>{{ $data->nama_admin }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->username }}</td>
            <td>
                <a href="{{ route('pakaian.edit', $data->id_admin) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
