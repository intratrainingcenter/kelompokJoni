<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
use App\Guru;
use App\datasiswa;
use App\mataplajaran;

class Controllerbiasa extends Controller
{
    public function index()
    {
      $student = datasiswa::count();
      $teacher = Guru::count();
      $study = mataplajaran::count();
      $class = kelas::count();

      return view('backend/contents',['student'=>$student,'teacher'=>$teacher,'study'=>$study,'class'=>$class]);
    }
    public function Tampilkosngan()
    {
      return view('test');
    }
    public function tampil()
    {
       return 'code...' ;
    }
}
