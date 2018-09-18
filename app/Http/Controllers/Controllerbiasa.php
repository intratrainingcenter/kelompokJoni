<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controllerbiasa extends Controller
{
    public function index($id)
    {
      return $id;
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
