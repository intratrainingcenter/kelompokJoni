<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageSekolah extends Controller
{
    public function datasiswa()
    {
      // $data = DB::table('datasiswas')->get();
      // dd($data);
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
