<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranModel;
use App\Models\TransaksiModel;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->PembayaranModel = new PembayaranModel();
        $this->TransaksiModel = new TransaksiModel();

    }

    public function index(){
        $data = [
            'pembayaran' => $this->PembayaranModel->allData(),
            'transaksi' => $this->TransaksiModel->allData(),
        ];
        return view('layout.pembayaran', $data);
    }

    // tambah data
    public function tambah(){
        $data = [
            'pembayaran' => $this->PembayaranModel->tambah(),
            'transaksi' => $this->TransaksiModel->allData(),
        ];
        return view('layout.createPembayaran', $data);
    }

    // simpan
    public function simpan(){
        Request()->validate([
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
            'id_transaksi' => 'required',
        ]);

        //Create
        $data = [
            'tanggal_bayar' => Request()->tanggal_bayar,
            'total_bayar' => Request()->total_bayar,
            'id_transaksi' => Request()->id_transaksi,
        ];

        $this->PembayaranModel->addData($data);
        return redirect()->route('pembayaran')->with('pesan','Data Berhasil Ditambahkan');
    }

    // edit
    public function edit($id_pembayaran){
        $data = [
            'pembayaran' => $this->PembayaranModel->detailData($id_pembayaran),
            'transaksi' => $this->TransaksiModel->allData(),
        ];
        return view('layout.editPembayaran', $data);
    }

    // update
    public function update($id_pembayaran)
    {
        Request()->validate([
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
            'id_transaksi' => 'required',
        ]);

        //Create
        $data = [
            'tanggal_bayar' => Request()->tanggal_bayar,
            'total_bayar' => Request()->total_bayar,
            'id_transaksi' => Request()->id_transaksi,
        ];

        $this->PembayaranModel->editData($id_pembayaran, $data);
        return redirect()->route('pembayaran')->with('pesan', 'Data Berhasil DiPerbarui');
    }

    // delete
    public function delete($id_pembayaran){
        $this->PembayaranModel->deleteData($id_pembayaran);
        return redirect()->route('pembayaran')->with('pesan','Data Berhasil Dihapus');
    }
}
