@extends('layout.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">Tambah Pembeli</div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('pembeli.store') }}" id="myForm">
            @csrf
                <div class="form-group">
                    <label for="id_pembeli">ID Pembeli</label> 
                    <input type="text" name="id_pembeli" class="form-control" id="id_pembeli" aria-describedby="id_pembeli" > 
                </div>
                <div class="form-group">
                    <label for="nama_pembeli">Nama</label> 
                    <input type="nama_pembeli" name="nama_pembeli" class="form-control" id="nama_pembeli" aria-describedby="nama_pembeli" > 
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="jenis_kelamin" name="jenis_kelamin" class="form-control" id="jenis_kelamin" aria-describedby="jenis_kelamin" > 
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label> 
                    <input type="alamat" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
 </div>
@endsection