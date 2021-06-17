@extends('layout.template')
@section('title','Pembayaran')

@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="float-right my-3">
            <div class="row ">
                <div class="col-sm-auto"><a class="btn btn-primary btn-sm" href="{{ route('pembayaran.create') }}"> Input Pembayaran</a></div>
            </div>    
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <?php $no=1; ?>
        @foreach ($paginate as $PembayaranModel)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ $PembayaranModel->tanggal_bayar }}</td>
            <td>{{ $PembayaranModel->total_bayar }}</td>
            <td>
            <form action="{{ route('pembayaran.destroy',$PembayaranModel->id_pembayaran) }}" method="POST">
 
                    <a class="btn btn-info" href="{{ route('pembayaran.show',$PembayaranModel->id_pembayaran) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('pembayaran.edit',$PembayaranModel->id_pembayaran) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
 </table>
 </div>
@endsection
