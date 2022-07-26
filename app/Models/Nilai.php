<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;   
    // field apa saja yang bisa di isi
    public $fillable = ['id', 'nis', 'kode_mata_pelajaran', 'alamat_siswa', 'tanggal_lahir'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;
}
