<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurus';
    protected $filable = ['kode_guru','nama_guru','no_tlf'];
}
