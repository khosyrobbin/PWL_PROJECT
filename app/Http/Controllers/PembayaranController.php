<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranModel;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembay = PembayaranModel::all(); 
        $paginate = PembayaranModel::orderBy('id_pembayaran', 'desc')->paginate(6);
        return view('layout.pembayaran', compact('paginate'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.createPembayaran');
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
            'id_pembayaran' => 'required',
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
            
            ]);
            
            PembayaranModel::create($request->all());
            
            return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pembayaran)
    {
        $PembayaranModel = PembayaranModel::find($id_pembayaran);
        return view('layout.detailPembayaran', compact('PembayaranModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pembayaran)
    {
        $PembayaranModel = PembayaranModel::find($id_pembayaran);
        return view('layout.editPembayaran', compact('PembayaranModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pembayaran)
    {
        $request->validate([
            'id_pembayaran' => 'required',
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
            
            ]);
           
            PembayaranModel::find($id_pembayaran)->update($request->all());
           
            return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembayaran)
    {
        PembayaranModel::find($id_pembayaran)->delete();
        return redirect()->route('pembayaran.index')
        -> with('success', 'Pembayaran Berhasil Dihapus');
    }
}
