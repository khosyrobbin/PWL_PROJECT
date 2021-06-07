<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->SupplierModel = new SupplierModel();
    }

    public function index(){
        $data = [
            'supplier' => $this->SupplierModel->allData(),
        ];
        return view('layout.supplier', $data);
    }

    // tambah data
    public function tambah(){
        return view('layout.tambahSupplier');
    }

    // simpan
    public function simpan(){
        Request()->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        //Create
        $data = [
            'nama_supplier' => Request()->nama_supplier,
            'no_telp' => Request()->no_telp,
            'alamat' => Request()->alamat,
        ];

        $this->SupplierModel->addData($data);
        return redirect()->route('supplier')->with('pesan','Data Berhasil Ditambahkan');
    }

    // edit
    public function edit($id_supplier){
        $data = [
            'supplier' => $this->SupplierModel->detailData($id_supplier),
        ];
        return view('layout.editSupplier', $data);
    }

    // update
    public function update($id_supplier)
    {
        Request()->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $data = [
            'nama_supplier' => Request()->nama_supplier,
            'no_telp' => Request()->no_telp,
            'alamat' => Request()->alamat,
        ];

        $this->SupplierModel->editData($id_supplier, $data);
        return redirect()->route('supplier')->with('pesan', 'Data Berhasil DiPerbarui');
    }

    // delete
    public function delete($id_supplier){
        $this->SupplierModel->deleteData($id_supplier);
        return redirect()->route('supplier')->with('pesan','Data Berhasil Dihapus');
    }

    // Search data
    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'supplier' => DB::table('supplier')
            ->where('nama_supplier','like',"%".$cari."%")
            ->orWhere('alamat','like',"%".$cari."%")
            ->orWhere('no_telp','like',"%".$cari."%")
            ->paginate(5),
        ];


        // mengirim data pegawai ke view index
        return view('layout.supplier', $data);
    }
}
