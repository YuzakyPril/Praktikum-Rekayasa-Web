<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MahasiswaController;

class Mahasiswa extends Model
{
    //
    protected $table = "mahasiswa";
    protected $fillable = ['nim', 'nama', 'alamat', 'tanggal_lahir','fakultas', 'prodi'];
}
