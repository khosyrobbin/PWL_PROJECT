@extends('layout.template')
@section('title','Barang')

@section('content')
    @if (auth()->user()->level==1)
    @elseif (auth()->user()->level==2)
    <a href="/barang/tambah" class="btn btn-primary btn-sm " >Tambah</a> <br>
    @elseif (auth()->user()->level==3)
    @endif
{{-- <a href="/barang/tambah" class="btn btn-primary btn-sm " >Tambah</a> <br> --}}
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sucsess!</h4>
        {{session('pesan')}}.
      </div>
    @endif

    {{-- search --}}
    <p>Cari Barang :</p>
    <form action="/barang/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Barang .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
    </form>

    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Supplier</th>
                    @if (auth()->user()->level==1)
                    <th>ACTION</th>
                    @elseif (auth()->user()->level==2)
                    <th>ACTION</th>
                    @elseif (auth()->user()->level==3)
                    @endif
                </tr>
            </thead>
            <tbody class="table">
                <?php $no=1; ?>
                @foreach ($barang as $data)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $data->nama_barang }}</td>
                        <td>{{ $data->harga }}</td>
                        <td>{{ $data->stok }}</td>
                        <td>{{ $data->nama_supplier }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-sm btn-success">Detail</a> --}}
                            @if (auth()->user()->level==1)
                            <a href="/barang/edit/{{ $data->id_barang }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_barang }}">
                                DELETE
                            </button>
                            @elseif (auth()->user()->level==2)
                            <a href="/barang/edit/{{ $data->id_barang }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_barang }}">
                                DELETE
                            </button>
                            @elseif (auth()->user()->level==3)
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- delete notif --}}
        @foreach ($barang as $data)
            <div class="modal modal-danger fade" id="delete{{ $data->id_barang }}">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">PERINGATAN!!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Yakin menghapus data {{ $data->nama_barang }} ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                            <a href="/barang/delete/{{ $data->id_barang }}" class="btn btn-outline">YES</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            <!-- /.modal-dialog -->
            </div>
        @endforeach
    </div
@endsection
