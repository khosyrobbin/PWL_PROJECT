@extends('layout.template')
@section('title','Tambah Pembayaran')

@section('content')
    <form action="/pembayaran/simpan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content" style="height:600px">
            <div class="rows">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input name="tanggal_bayar" class="form-control @error('tanggal_bayar') is-invalid @enderror">
                        <div class="text-danger">
                            @error('tanggal_bayar')
                                Tanggal Bayar Salah/Kosong
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Total Bayar</label>
                        <input name="total_bayar" class="form-control @error('total_bayar') is-invalid @enderror">
                        <div class="text-danger">
                            @error('total_bayar')
                                Total Bayar Salah/Kosong
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