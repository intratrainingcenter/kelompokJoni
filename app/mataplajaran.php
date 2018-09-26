<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mataplajaran extends Model
{
    protected $table = 'mataplajarans';
    protected $filable = ['kode_mata_pelajaran','nama_pelajaran','hari', 'kode_guru','jam'];
}
