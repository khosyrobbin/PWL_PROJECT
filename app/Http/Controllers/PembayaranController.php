<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranModel;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->PembayaranModel = new PembayaranModel();
        // $this->SupplierModel = new SupplierModel();

    }

    public function index(){
        $data = [
            'pembayaran' => $this->PembayaranModel->allData(),
        ];
        return view('layout.pembayaran', $data);
    }

    // tambah data
    public function tambah(){
        $data = [
            'pembayaran' => $this->PembayaranModel->tambah(),
            // 'supplier' => $this->SupplierModel->allData(),
        ];
        return view('layout.createPembayaran', $data);
    }

    // simpan
    public function simpan(){
        Request()->validate([
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
        ]);

        //Create
        $data = [
            'tanggal_bayar' => Request()->nama_barang,
            'total_bayar' => Request()->harga,
        ];

        $this->PembayaranModel->addData($data);
        return redirect()->route('pembayaran')->with('pesan','Data Berhasil Ditambahkan');
    }

    // edit
    public function edit($id_pembayaran){
        $data = [
            'pembayaran' => $this->PembayaranModel->detailData($id_pembayaran),
            // 'supplier' => $this->SupplierModel->allData(),
        ];
        return view('layout.editPembayaran', $data);
    }

    // update
    public function update($id_pembayaran)
    {
        Request()->validate([
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
        ]);

        //Create
        $data = [
            'tanggal_bayar' => Request()->nama_barang,
            'total_bayar' => Request()->harga,
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
