@extends('layout.template')
@section('title','Transaksi')

@section('content')
<div class="col-md-12">
<div class="row">
        <div class="float-right my-3">
            <div class="row ">
                <div class="col-sm-auto"><a class="btn btn-primary btn-sm" href="{{ route('transaksi.create') }}"> Input Transaksi</a></div>
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
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <?php $no=1; ?>
        @foreach ($paginate as $TransaksiModel)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ $TransaksiModel->tanggal }}</td>
            <td>{{ $TransaksiModel->keterangan }}</td>
            <td>
            <form action="{{ route('transaksi.destroy',$TransaksiModel->id_transaksi) }}" method="POST">
 
                    <a class="btn btn-info" href="{{ route('transaksi.show',$TransaksiModel->id_transaksi) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('transaksi.edit',$TransaksiModel->id_transaksi) }}">Edit</a>
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
