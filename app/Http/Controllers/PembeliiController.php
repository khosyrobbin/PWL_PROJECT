<?php

namespace App\Http\Controllers;

use App\Models\PembeliiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembeliiController extends Controller
{
    public function __construct()
    {
        $this->PembeliiModel = new PembeliiModel();
    }

    public function index(){
        $data = [
            'pembeli' => $this->PembeliiModel->allData(),
        ];
        return view('layout.pembelii', $data);
    }

    // tambah data
    public function tambah(){
        return view('layout.tambahPembeli');
    }

    // simpan
    public function simpan(){
        Request()->validate([
            'nama_pembeli' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        //Create
        $data = [
            'nama_pembeli' => Request()->nama_pembeli,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'alamat' => Request()->alamat,
        ];

        $this->PembeliiModel->addData($data);
        return redirect()->route('pembelii')->with('pesan','Data Berhasil Ditambahkan');
    }

    // edit
    public function edit($id_pembeli){
        $data = [
            'pembeli' => $this->PembeliiModel->detailData($id_pembeli),
        ];
        return view('layout.editPembelii', $data);
    }

    // update
    public function update($id_pembeli)
    {
        Request()->validate([
            'nama_pembeli' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $data = [
            'nama_pembeli' => Request()->nama_pembeli,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'alamat' => Request()->alamat,
        ];

        $this->PembeliiModel->editData($id_pembeli, $data);
        return redirect()->route('pembelii')->with('pesan', 'Data Berhasil DiPerbarui');
    }

    // delete
    public function delete($id_pembeli){
        $this->PembeliiModel->deleteData($id_pembeli);
        return redirect()->route('pembelii')->with('pesan','Data Berhasil Dihapus');
    }

    // Search data
    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'pembeli' => DB::table('pembeli')
            ->where('nama_pembeli','like',"%".$cari."%")
            ->orWhere('alamat','like',"%".$cari."%")
            ->paginate(5),
        ];


        // mengirim data pegawai ke view index
        return view('layout.pembelii', $data);
    }
}
