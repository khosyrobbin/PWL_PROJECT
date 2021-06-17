@extends('layout.template')
@section('title','Tambah Barang')

@section('content')
    <form action="/barang/simpan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror">
                        <div class="text-danger">
                            @error('nama_barang')
                                Nama Barang Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" class="form-control @error('harga') is-invalid @enderror">
                        <div class="text-danger">
                            @error('harga')
                                Harga Telepon Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input name="stok" class="form-control @error('stok') is-invalid @enderror">
                        <div class="text-danger">
                            @error('stok')
                                Stok Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <select name="id_supplier" class="form-control @error('id_supplier') is-invalid @enderror">
                            <option value="">--Pilih Supplier--</option>
                            @foreach ($supplier as $sp)
                                <option value="{{$sp->id_supplier}}">{{$sp->nama_supplier}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_supplier')
                                Nama Supplier Salah/Kosong
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
