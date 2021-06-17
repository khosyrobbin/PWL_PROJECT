@extends('layout.template')
@section('title','Detail Pembeli')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama: </b>{{$PembeliModel->nama_pembeli}}</li>
                        <li class="list-group-item"><b>Jenis Kelamin: </b>{{$PembeliModel->jenis_kelamin}}</li>
                        <li class="list-group-item"><b>Alamat: </b>{{$PembeliModel->alamat}}</li>
                        
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('pembeli.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection