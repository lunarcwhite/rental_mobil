<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['nik','namaLengkap','tanggalLahir', 'alamatTempatTinggal', 'kecamatan', 'desa', 'rw', 'rt', 'noHp', 'kyc', 'userId'];

}
