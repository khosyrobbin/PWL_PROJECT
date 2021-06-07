<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\PembeliModel as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class PembeliModel extends Model
{
 
    protected $table="pembeli"; 
    public $timestamps= false; 
    protected $primaryKey = 'id_pembeli';

    protected $fillable = [
        'id_pembeli',
        'nama_pembeli',
        'jenis_kelamin',
        'alamat',

    ];
}
