@extends('layout.template')
@section('title','Pembayaran')

@section('content')
    @if (auth()->user()->level==1)
    @elseif (auth()->user()->level==2)
    @elseif (auth()->user()->level==3)
    <a href="/pembayaran/tambah" class="btn btn-primary btn-sm " >Tambah</a> <br>
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
                    <th>No</th>
                    <th>Transaksi</th>
                    <th>Tanggal Bayar</th>
                    <th>Total Bayar</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody class="table">
                <?php $no=1; ?>
                @foreach ($pembayaran as $data)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        {{-- @foreach ($transaksi as $trs)
                            <td>{{ $trs->nama_pembeli }}</td>
                        @endforeach --}}
                        <td>{{ $data->id_transaksi }}</td>
                        <td>{{ $data->tanggal_bayar }}</td>
                        <td>{{ $data->total_bayar }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-sm btn-success">Detail</a> --}}
                            <a href="/pembayaran/edit/{{ $data->id_pembayaran }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pembayaran }}">
                                DELETE
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- delete notif --}}
        @foreach ($pembayaran as $data)
            <div class="modal modal-danger fade" id="delete{{ $data->id_pembayaran }}">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">PERINGATAN!!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Yakin menghapus data {{ $data->tanggal_bayar }} ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                            <a href="/pembayaran/delete/{{ $data->id_pembayaran }}" class="btn btn-outline">YES</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            <!-- /.modal-dialog -->
            </div>
        @endforeach
    </div
@endsection
