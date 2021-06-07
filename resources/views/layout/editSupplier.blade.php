@extends('layout.template')
@section('title','Edit Supplier')

@section('content')
    <form action="/supplier/update/{{$supplier->id_supplier}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" value="{{$supplier->nama_supplier}}">
                        <div class="text-danger">
                            @error('nama_supplier')
                                Nama Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No Telpon</label>
                        <input name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{$supplier->no_telp}}">
                        <div class="text-danger">
                            @error('no_telp')
                                No Telepon Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$supplier->alamat}}">
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
