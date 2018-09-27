<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Guru::orderBy('id', 'DESC')->get();
        return view('page.guru.guru',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Ymdh');
        $count = Guru::count()+1;
        $insert = new Guru;
        $insert->kode_guru='GR-'.$date.$count;
        $insert->nama_guru=$request->nama_guru;
        $insert->no_tlf=$request->no_tlf;
        $insert->save();

        return redirect('guru')->with(['success' => 'Proses Penambahan Guru Berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $Update = Guru::where('kode_guru',$request->kode_guru)->first();
      $Update->kode_guru=$request->kode_guru;
      $Update->no_tlf=$request->no_tlf;
      $Update->nama_guru=$request->nama_guru;
      $Update->save();

      return redirect('guru')->with(['success'=> 'Proses edit Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_guru)
    {
        $Delete = Guru::where('kode_guru',$kode_guru)->first();
        $Delete->delete();

        return redirect('guru')->with(['success'=>'Proses Delete Berhasil']);
    }
}
