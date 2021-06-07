@extends('layout.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
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
            <form method="post" action="{{ route('transaksi.store') }}" id="myForm">
            @csrf
                <div class="form-group">
                    <label for="id_transaksi">ID Transaksi</label> 
                    <input type="text" name="id_transaksi" class="form-control" id="id_transaksi" aria-describedby="id_transaksi" > 
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label> 
                    <input type="tanggal" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal" > 
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="keterangan" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
 </div>
@endsection