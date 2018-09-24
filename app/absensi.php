<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    protected $table = 'absensis';
    protected $filable = ['kode_absensi','nis','ijin','alpa','sakit','masuk'];
}
