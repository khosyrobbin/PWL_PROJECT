@extends('layout.template')
@section('title','Pembeli')

@section('content')
    @if (auth()->user()->level==1)
    @elseif (auth()->user()->level==2)
    @elseif (auth()->user()->level==3)
    <a href="/pembeli/tambah" class="btn btn-primary btn-sm " >Tambah</a> <br>
    @endif
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sucsess!</h4>
        {{session('pesan')}}.
      </div>
    @endif

    {{-- search --}}
    <p>Cari Pembeli :</p>
    <form action="/pembeli/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Pembeli .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($pembeli as $data)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $data->nama_pembeli }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-sm btn-success">Detail</a> --}}
                            <a href="/pembeli/edit/{{ $data->id_pembeli }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pembeli }}">
                                DELETE
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- delete notif --}}
    @foreach ($pembeli as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_pembeli }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">PERINGATAN!!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Yakin menghapus data {{ $data->nama_pembeli }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                        <a href="/pembeli/delete/{{ $data->id_pembeli }}" class="btn btn-outline">YES</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    @endforeach
    </div
@endsection
