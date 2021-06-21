@extends('layout.template')
@section('title','Edit Pembeli')

@section('content')
    <form action="/pembeli/update/{{$pembeli->id_pembeli}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror" value="{{$pembeli->nama_pembeli}}">
                        <div class="text-danger">
                            @error('nama_pembeli')
                                Nama Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{$pembeli->jenis_kelamin}}">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        {{-- <input name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"> --}}
                        <div class="text-danger">
                            @error('jenis_kelamin')
                                Jenis Kelamin Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$pembeli->alamat}}">
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
