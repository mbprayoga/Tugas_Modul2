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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Pakaian</h5>
        <form method="post" action="{{ route('pakaian.update', $data->ID_Pakaian) }}">
            @csrf
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
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->ID_Pakaian }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->ID_Pakaian }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('pakaian.delete', $data->ID_Pakaian) }}">
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
