<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datasiswa extends Model
{
    protected $table = 'datasiswas';
    protected $fillable = ['nis','nama','jenis_kelamin','no_hp','alamat'];
}
