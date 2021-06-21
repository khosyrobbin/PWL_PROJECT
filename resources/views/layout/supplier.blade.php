@extends('layout.template')
@section('title','Supplier')

@section('content')
    @if (auth()->user()->level==1)
    @elseif (auth()->user()->level==2)
    <a href="/supplier/tambah" class="btn btn-primary btn-sm " >Tambah</a> <br>
    @elseif (auth()->user()->level==3)
    @endif
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sucsess!</h4>
        {{session('pesan')}}.
      </div>
    @endif

    {{-- search --}}
    <p>Cari Supplier :</p>
    <form action="/supplier/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Supplier .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Alamat</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($supplier as $data)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $data->nama_supplier }}</td>
                        <td>{{ $data->no_telp }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-sm btn-success">Detail</a> --}}
                            <a href="/supplier/edit/{{ $data->id_supplier }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_supplier }}">
                                DELETE
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- delete notif --}}
    @foreach ($supplier as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_supplier }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">PERINGATAN!!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Yakin menghapus data {{ $data->nama_supplier }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                        <a href="/supplier/delete/{{ $data->id_supplier }}" class="btn btn-outline">YES</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    @endforeach
    </div
@endsection
