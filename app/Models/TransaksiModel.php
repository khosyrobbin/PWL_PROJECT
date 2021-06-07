<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\TransaksiModel as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class TransaksiModel extends Model
{
    protected $table="transaksi"; 
    public $timestamps= false; 
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_transaksi',
        'tanggal',
        'keterangan',

    ];
}
