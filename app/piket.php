<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class piket extends Model
{
    protected $table = 'pikets';
    protected $filable = ['kode_piket','hari','nis','kode_siswa'];
}
