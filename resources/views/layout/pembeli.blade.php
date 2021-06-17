@extends('layout.template')
@section('title','Pembeli')

@section('content')
    <div class="col-md-12">
    <div class="row">
        <div class="float-right my-3">
            <div class="row ">
                <div class="col-sm-auto"><a class="btn btn-primary btn-sm" href="{{ route('pembeli.create') }}"> Input Pembeli</a></div>
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
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
        <?php $no=1; ?>
        @foreach ($paginate as $PembeliModel)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{ $PembeliModel->nama_pembeli }}</td>
            <td>{{ $PembeliModel->jenis_kelamin }}</td>
            <td>{{ $PembeliModel->alamat }}</td>
            <td>
            <form action="{{ route('pembeli.destroy',$PembeliModel->id_pembeli) }}" method="POST">
 
                    <a class="btn btn-info" href="{{ route('pembeli.show',$PembeliModel->id_pembeli) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('pembeli.edit',$PembeliModel->id_pembeli) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
 </table>
 </div>
 </div>
@endsection
