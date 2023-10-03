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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Transaksi</h5>
        <form method="post" action="{{ route('transaksi.update', $data->ID_Transaksi) }}">
            @csrf
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
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->ID_Transaksi }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->ID_Transaksi }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('transaksi.delete', $data->ID_Transaksi) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
@stop
