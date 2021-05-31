@extends('layout.template')
@section('title','Pembeli')

@section('content')
    <h1>Halaman Pembeli</h1>
    <div class="row">
        <div class="float-right my-3">
            <div class="row ">
                <div class="col-sm-auto"><a class="btn btn-success" href="{{ route('pembeli.create') }}"> Input Pembeli</a></div>
            </div>    
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>ID Pembeli</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th width="280px">Action</th>
        </tr>
    
        @foreach ($paginate as $PembeliModel)
        <tr>
 
            <td>{{ $PembeliModel->id_pembeli }}</td>
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
@endsection
