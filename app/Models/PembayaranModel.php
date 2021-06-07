<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\PembayaranModel as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class PembayaranModel extends Model
{
    protected $table="pembayaran"; 
    public $timestamps= false; 
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pemabayaran',
        'tanggal_bayar',
        'total_bayar',

    ];
}
