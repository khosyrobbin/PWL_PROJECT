@extends('layout.template')
@section('title','Edit Transaksi')

@section('content')
    <form action="/transaksi/update/{{$transaksi->id_transaksi}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input name="tanggal"  type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{$transaksi->tanggal}}">
                        <div class="text-danger">
                            @error('tanggal')
                                Tanggal Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Pembeli</label>
                        <select name="id_pembeli" class="form-control @error('id_pembeli') is-invalid @enderror" value="{{$transaksi->id_pembeli}}">
                            @foreach ($pembeli as $pmb)
                                <option value="{{$pmb->id_pembeli}}">{{$pmb->nama_pembeli}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_pembeli')
                                Nama Pembeli Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="id_barang" class="form-control @error('id_barang') is-invalid @enderror" value="{{$transaksi->id_barang}}" >
                            @foreach ($barang as $brg)
                                <option value="{{$brg->id_barang}}" @if ($transaksi->id_barang==$brg->id_barang)
                                    selected = 'selected'
                                @endif>{{$brg->nama_barang}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('id_barang')
                                Nama Barang Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{$transaksi->keterangan}}">
                        <div class="text-danger">
                            @error('keterangan')
                                Keterangan Salah/Kosong
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
