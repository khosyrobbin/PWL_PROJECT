@extends('layout.template')
@section('title','Transaksi')

@section('content')
    @if (auth()->user()->level==1)
    <a href="/transaksi/print"  target="_blank" class="btn btn-success btn-sm">Print</a> <br>
    @elseif (auth()->user()->level==2)
    <a href="/transaksi/print"  target="_blank" class="btn btn-success btn-sm">Print</a> <br>
    @elseif (auth()->user()->level==3)
    <a href="/transaksi/create" class="btn btn-primary btn-sm " >Tambah</a>
    {{-- <a href="/transaksi/print"  target="_blank" class="btn btn-success btn-sm">Print</a> <br> --}}
    @endif
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sucsess!</h4>
        {{session('pesan')}}.
      </div>
    @endif


    <div class="box-body">
        <table class="table table-striped table-hover">
            <thead class=" bg-light-blue-active">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Keterangan</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($transaksi as $data)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>{{ $data->nama_pembeli }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-sm btn-success">Detail</a> --}}
                            <a href="/transaksi/edit/{{ $data->id_transaksi }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_transaksi }}">
                                DELETE
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- delete notif --}}
    @foreach ($transaksi as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_transaksi }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">PERINGATAN!!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Yakin menghapus data {{ $data->tanggal }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                        <a href="/transaksi/delete/{{ $data->id_transaksi }}" class="btn btn-outline">YES</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    @endforeach
    </div
@endsection
