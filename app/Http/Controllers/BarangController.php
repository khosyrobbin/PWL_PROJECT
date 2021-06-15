<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->SupplierModel = new SupplierModel();

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
            'supplier' => $this->SupplierModel->allData(),
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
            'supplier' => $this->SupplierModel->allData(),
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

    // Search data
    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'barang' => DB::table('barang')
            ->join('supplier', 'supplier.id_supplier', '=', 'barang.id_supplier')
            ->where('nama_barang','like',"%".$cari."%")
            ->orWhere('harga','like',"%".$cari."%")
            ->orWhere('nama_supplier','like',"%".$cari."%")
            ->paginate(5),
        ];


        // mengirim data pegawai ke view index
        return view('layout.barang', $data);
    }
}
