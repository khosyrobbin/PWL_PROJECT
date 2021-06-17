<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembeliModel;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelis = PembeliModel::all(); // Mengambil semua isi tabel
        $paginate = PembeliModel::orderBy('id_pembeli', 'desc')->paginate(6);
        return view('layout.pembeli', compact('paginate'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.createPembeli');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pembeli' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            
            ]);
            
            PembeliModel::create($request->all());
            
            return redirect()->route('pembeli.index')
            ->with('success', 'Pembeli Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pembeli)
    {
        $PembeliModel = PembeliModel::find($id_pembeli);
        return view('layout.detailPembeli', compact('PembeliModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pembeli)
    {
        $PembeliModel = PembeliModel::find($id_pembeli);
        return view('layout.editPembeli', compact('PembeliModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pembeli)
    {
        $request->validate([
            'nama_pembeli' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            
            ]);
           
            PembeliModel::find($id_pembeli)->update($request->all());
           
            return redirect()->route('pembeli.index')
            ->with('success', 'Pembeli Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembeli)
    {
        PembeliModel::find($id_pembeli)->delete();
        return redirect()->route('pembeli.index')
        -> with('success', 'Pembeli Berhasil Dihapus');
    }
}
