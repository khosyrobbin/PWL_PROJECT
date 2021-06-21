<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BarangModel;
use Illuminate\Support\Facades\DB;

class TransaksiModel extends Model
{
    public function allData(){
        return DB::table('transaksi')
        ->join('barang', 'barang.id_barang', '=', 'transaksi.id_barang')
        ->join('pembeli', 'pembeli.id_pembeli', '=', 'transaksi.id_pembeli')
        ->paginate(5);
    }
    public function addData($data){
        DB::table('transaksi')->insert($data);
    }
    public function detailData($id_transaksi){
        return DB::table('transaksi')->where('id_transaksi', $id_transaksi)
        ->join('barang', 'barang.id_barang', '=', 'transaksi.id_barang')
        ->join('pembeli', 'pembeli.id_pembeli', '=', 'transaksi.id_pembeli')
        ->first();
    }
    public function editData($id_transaksi, $data){
        DB::table('transaksi')->where('id_transaksi', $id_transaksi)->update($data);
    }
    public function deleteData($id_transaksi){
        DB::table('transaksi')->where('id_transaksi', $id_transaksi)->delete();
    }
    public function create(){
        return DB::table('transaksi')
        ->join('barang', 'barang.id_barang', '=', 'transaksi.id_transaksi')
        ->join('pembeli', 'pembeli.id_pembeli', '=', 'transaksi.id_pembeli')
        ->get();
    }
}
