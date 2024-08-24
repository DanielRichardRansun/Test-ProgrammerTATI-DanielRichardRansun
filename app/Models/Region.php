<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'wilayah'; //databse tabel 'wilayah'

    protected $primaryKey = 'kode'; // 'kode' = primary key
    public $incrementing = false; // tidak auto-increment
    protected $keyType = 'string'; // tipe data primary key string

    public $timestamps = false;
    protected $fillable = ['kode', 'nama']; // kolom yang bisa diisi
}
