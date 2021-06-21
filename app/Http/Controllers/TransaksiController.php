<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\BarangModel;
use App\Models\PembeliiModel;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->BarangModel = new BarangModel();
        $this->PembeliiModel = new PembeliiModel();

    }

    public function index(){
        $data = [
            'transaksi' => $this->TransaksiModel->allData(),
        ];
        return view('layout.transaksi', $data);
    }

    // tambah data
    public function create(){
        $data = [
            'transaksi' => $this->TransaksiModel->create(),
            'barang' => $this->BarangModel->allData(),
            'pembeli' => $this->PembeliiModel->allData(),
        ];
        return view('layout.createTransaksi', $data);
    }

    // simpan
    public function simpan(){
        Request()->validate([
            'tanggal' => 'required',
            'id_barang' => 'required',
            'id_pembeli' => 'required',
            'keterangan' => 'required',
        ]);

        //Create
        $data = [
            'tanggal' => Request()->tanggal,
            'id_barang' => Request()->id_barang,
            'id_pembeli' => Request()->id_pembeli,
            'keterangan' => Request()->keterangan,
        ];

        $this->TransaksiModel->addData($data);
        return redirect()->route('transaksi')->with('pesan','Data Berhasil Ditambahkan');
    }

    // edit
    public function edit($id_transaksi){
        $data = [
            'transaksi' => $this->TransaksiModel->detailData($id_transaksi),
            'barang' => $this->BarangModel->allData(),
            'pembeli' => $this->PembeliiModel->allData(),
        ];
        return view('layout.editTransaksi', $data);
    }

    // update
    public function update($id_transaksi)
    {
        Request()->validate([
            'tanggal' => 'required',
            'id_barang' => 'required',
            'id_pembeli' => 'required',
            'keterangan' => 'required',
        ]);

        //Create
        $data = [
            'tanggal' => Request()->tanggal,
            'id_barang' => Request()->id_barang,
            'id_pembeli' => Request()->id_pembeli,
            'keterangan' => Request()->keterangan,
        ];

        $this->TransaksiModel->editData($id_transaksi, $data);
        return redirect()->route('transaksi')->with('pesan', 'Data Berhasil DiPerbarui');
    }

    // delete
    public function delete($id_transaksi){
        $this->TransaksiModel->deleteData($id_transaksi);
        return redirect()->route('transaksi')->with('pesan','Data Berhasil Dihapus');
    }

    //print
    public function print(){
        $data = [
            'transaksi' => $this->TransaksiModel->allData(),
        ];
        return view('layout.print', $data);
    }

    // Search data
    // public function cari(Request $request){
    //     // menangkap data pencarian
	// 	$cari = $request->cari;

    //     // mengambil data dari table pegawai sesuai pencarian data
    //     $data = [
    //         'barang' => DB::table('barang')
    //         ->join('supplier', 'supplier.id_supplier', '=', 'barang.id_supplier')
    //         ->where('nama_barang','like',"%".$cari."%")
    //         ->orWhere('harga','like',"%".$cari."%")
    //         ->orWhere('nama_supplier','like',"%".$cari."%")
    //         ->paginate(5),
    //     ];


    //     // mengirim data pegawai ke view index
    //     return view('layout.barang', $data);
    // }
}
