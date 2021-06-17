@extends('layout.template')
@section('title','Detail Pembayaran')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Tanggal: </b>{{$PembayaranModel->tanggal_bayar}}</li>
                        <li class="list-group-item"><b>Total: </b>{{$PembayaranModel->total_bayar}}</li>
                        
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('pembayaran.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection