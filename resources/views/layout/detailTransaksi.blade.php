@extends('layout.template')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Tanggal: </b>{{$TransaksiModel->tanggal}}</li>
                        <li class="list-group-item"><b>Keterangan: </b>{{$TransaksiModel->keterangan}}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('transaksi.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection