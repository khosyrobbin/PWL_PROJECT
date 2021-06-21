<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembayaranModel extends Model
{
    public function allData(){
        return DB::table('pembayaran')
        // ->join('supplier', 'supplier.id_supplier', '=', 'barang.id_supplier')
        ->paginate(5);
    }
    public function addData($data){
        DB::table('pembayaran')->insert($data);
    }
    public function detailData($id_barang){
        return DB::table('pembayaran')->where('id_pembayaran', $id_pembayaran)
        // ->join('supplier', 'supplier.id_supplier', '=', 'barang.id_supplier')
        ->first();
    }
    public function editData($id_barang, $data){
        DB::table('pembayaran')->where('id_pembayaran', $id_pembayaran)->update($data);
    }
    public function deleteData($id_barang){
        DB::table('pembayaran')->where('id_pembayaran', $id_pembayaran)->delete();
    }
    public function tambah(){
        return DB::table('pembayaran')
        // ->join('supplier', 'supplier.id_supplier', '=', 'barang.id_supplier')
        ->get();
    }
}
