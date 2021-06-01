<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index(){
        $data = [
            'barang' => $this->BarangModel->allData(),
        ];
        return view('layout.barang', $data);
    }

    // tambah data
    public function tambah(){
        $data = [
            'barang' => $this->BarangModel->tambah(),
        ];
        return view('layout.tambahBarang', $data);
    }

    // simpan
    public function simpan(){
        Request()->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_supplier' => 'required',
        ]);

        //Create
        $data = [
            'nama_barang' => Request()->nama_barang,
            'harga' => Request()->harga,
            'stok' => Request()->stok,
            'id_supplier' => Request()->id_supplier,
        ];

        $this->BarangModel->addData($data);
        return redirect()->route('barang')->with('pesan','Data Berhasil Ditambahkan');
    }

    // edit
    public function edit($id_barang){
        $data = [
            'barang' => $this->BarangModel->detailData($id_barang),
        ];
        return view('layout.editBarang', $data);
    }

    // update
    public function update($id_barang)
    {
        Request()->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_supplier' => 'required',
        ]);

        //Create
        $data = [
            'nama_barang' => Request()->nama_barang,
            'harga' => Request()->harga,
            'stok' => Request()->stok,
            'id_supplier' => Request()->id_supplier,
        ];

        $this->BarangModel->editData($id_barang, $data);
        return redirect()->route('barang')->with('pesan', 'Data Berhasil DiPerbarui');
    }

    // delete
    public function delete($id_barang){
        $this->BarangModel->deleteData($id_barang);
        return redirect()->route('barang')->with('pesan','Data Berhasil Dihapus');
    }
}
