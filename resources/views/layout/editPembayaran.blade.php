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
                    <form method="post" action="{{ route('pembayaran.update', $PembayaranModel->id_pembayaran) }}" id="myForm">
                    @csrf
                    @method('PUT') <div class="form-group">
                    <div class="form-group">
                        <label for="tanggal_bayar">Tanggal</label> 
                        <input type="text" name="tanggal_bayar" class="form-control" id="tanggal_bayar" value="{{ $PembayaranModel->tanggal_bayar }}" aria-describedby="tanggal_bayar" > 
                    </div>
                    <div class="form-group">
                        <label for="total_bayar">Total</label> 
                        <input type="total_bayar" name="total_bayar" class="form-control" id="total_bayar" value="{{ $PembayaranModel->total_bayar }}" aria-describedby="total_bayar" > 
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection