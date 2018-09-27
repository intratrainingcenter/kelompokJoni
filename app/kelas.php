<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
  protected $table = 'kelas';
  protected $fillable = ['kode_kelas','nama_kelas','wali_kelas','keterangan_kelas'];
}
