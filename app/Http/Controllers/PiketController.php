<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\piket;

class PiketController extends Controller
{
    public function index(){
    $data = piket::all();
        return view('page.piket.piket',['data'=> $data]);
    }
}
