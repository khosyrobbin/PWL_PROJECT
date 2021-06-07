<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transak = TransaksiModel::all(); 
        $paginate = TransaksiModel::orderBy('id_transaksi', 'desc')->paginate(6);
        return view('layout.transaksi', compact('paginate'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.createTransaksi');
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
            'id_transaksi' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            
            ]);
            
            TransaksiModel::create($request->all());
            
            return redirect()->route('layout.transaksi')
            ->with('success', 'Transaksi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_transaksi)
    {
        $TransaksiModel = TransaksiModel::find($id_transaksi);
        return view('layout.detailTransaksi', compact('TransaksiModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_transaksi)
    {
        $TransaksiModel = TransaksiModel::find($id_transaksi);
        return view('layout.editTransaksi', compact('TransaksiModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_transaksi)
    {
        $request->validate([
            'id_transaksi' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            
            ]);
           
            TransaksiModel::find($id_transaksi)->update($request->all());
           
            return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        TransaksiModel::find($id_transaksi)->delete();
        return redirect()->route('transaksi')-> with('success', 'Transaksi Berhasil Dihapus');
    }
}
