@extends('layout.template')
@section('title','Edit Pembeli')

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
                    <form method="post" action="{{ route('pembeli.update', $PembeliModel->id_pembeli) }}" id="myForm">
                    @csrf
                    @method('PUT') <div class="form-group">
                    <div class="form-group">
                        <label for="nama_pembeli">Nama</label> 
                        <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" value="{{ $PembeliModel->nama_pembeli }}" aria-describedby="nama_pembeli" > 
                    </div>
                    <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="select2bs4 form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value=""> Pilih Jenis Kelamin </option>
                        <option value="L"
                            @if ($PembeliModel->jenis_kelamin == 'L')
                                selected
                            @endif
                        >Laki-Laki</option>
                        <option value="P"
                            @if ($PembeliModel->jenis_kelamin == 'P')
                                selected
                            @endif
                        >Perempuan</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label> 
                        <input type="alamat" name="alamat" class="form-control" id="alamat" value="{{ $PembeliModel->alamat }}" aria-describedby="alamat" > 
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection