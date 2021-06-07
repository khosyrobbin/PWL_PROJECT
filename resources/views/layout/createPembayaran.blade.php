@extends('layout.template')
@section('title','Tambah Pembayaran')

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
            <form method="post" action="{{ route('pembayaran.store') }}" id="myForm">
            @csrf
                <div class="form-group">
                    <label for="id_pembayaran">ID Pembayaran</label> 
                    <input type="text" name="id_pembayaran" class="form-control" id="id_pembayaran" aria-describedby="id_pembayaran" > 
                </div>
                <div class="form-group">
                    <label for="tanggal_bayar">Tanggal</label> 
                    <input type="tanggal_bayar" name="tanggal_bayar" class="form-control" id="tanggal_bayar" aria-describedby="tanggal_bayar" > 
                </div>
                <div class="form-group">
                    <label for="total_bayar">Total</label>
                    <input type="total_bayar" name="total_bayar" class="form-control" id="total_bayar" aria-describedby="total_bayar" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
 </div>
@endsection