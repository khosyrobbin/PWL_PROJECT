<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembeliiModel extends Model
{
    public function allData(){
        return DB::table('pembeli')->paginate(5);
    }
    public function addData($data){
        DB::table('pembeli')->insert($data);
    }
    public function detailData($id_pembeli){
        return DB::table('pembeli')->where('id_pembeli', $id_pembeli)->first();
    }
    public function editData($id_pembeli, $data){
        DB::table('pembeli')->where('id_pembeli', $id_pembeli)->update($data);
    }
    public function deleteData($id_pembeli){
        DB::table('pembeli')->where('id_pembeli', $id_pembeli)->delete();
    }
}
