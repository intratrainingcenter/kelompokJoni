<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageSekolah extends Controller
{
    public function datasiswa()
    {
      return view('/page/siswa');
    }
    public function piket()
    {
      return view('/page/piket');
    }
    public function absensi()
    {
      return view('/page/absensi');
    }
    public function mapel()
    {
      return view('/page/mapel');
    }
    public function kelas()
    {
      return view('/page/kelas');
    }
}
