<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembayaranModel extends Model
{
    public function allData(){
        return DB::table('pembayaran')
        ->join('transaksi', 'transaksi.id_transaksi', '=', 'pembayaran.id_transaksi')
        ->paginate(5);
    }
    public function addData($data){
        DB::table('pembayaran')->insert($data);
    }
    public function detailData($id_pembayaran){
        return DB::table('pembayaran')->where('id_pembayaran', $id_pembayaran)
        ->join('transaksi', 'transaksi.id_transaksi', '=', 'pembayaran.id_transaksi')
        ->first();
    }
    public function editData($id_pembayaran, $data){
        DB::table('pembayaran')->where('id_pembayaran', $id_pembayaran)->update($data);
    }
    public function deleteData($id_pembayaran){
        DB::table('pembayaran')->where('id_pembayaran', $id_pembayaran)->delete();
    }
    public function tambah(){
        return DB::table('pembayaran')
        ->join('transaksi', 'transaksi.id_transaksi', '=', 'pembayaran.id_transaksi')
        ->get();
    }
}
