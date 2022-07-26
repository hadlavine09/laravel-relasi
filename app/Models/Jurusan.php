<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    // field apa saja yang bisa di isi
    public $fillable = ['id', 'kode_mata_pelajaran', 'nama_mata_pelarajan', 'semester', 'jurusan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;
}
