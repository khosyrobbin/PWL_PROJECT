@extends('layout.template')
@section('title','Tambah Supplier')

@section('content')
    <form action="/supplier/simpan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror">
                        <div class="text-danger">
                            @error('nama_supplier')
                                Nama Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input name="no_telp" class="form-control @error('no_telp') is-invalid @enderror">
                        <div class="text-danger">
                            @error('no_telp')
                                No Telepon Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                        <div class="text-danger">
                            @error('alamat')
                                Alamat Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
