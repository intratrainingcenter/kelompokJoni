<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mataplajaran;
use App\Guru;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mataplajaran::all();
        $dataGuru = Guru::all();
        $selectGuru = [''=>'Pilih Guru Pengajar'];
        foreach ($dataGuru as $key => $pilihguru) {
             $selectGuru[$pilihguru->kode_guru]=$pilihguru->nama_guru;
            }
            return view('page.mapel.mapel',['data'=> $data,'selectGuru'=>$selectGuru]);
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
        $code = date("Ymdhis");
        $count = mataplajaran::count()+1;


        //  dd('n'.$code.$count);
        $insert = new mataplajaran;
        $insert->kode_mata_pelajaran='N'.$code.$count;
        $insert->nama_pelajaran=$request->nama_pelajaran;
        $insert->hari=$request->hari;
        $insert->kode_guru = $request->kode_guru;
        $insert->jam=$request->jam;                                                                          
        $insert->save();

        return redirect('mapel')->with(['success'=> 'Berhasil Menambahkan Mata Pelajaran']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      $Update = mataplajaran::where('kode_mata_pelajaran',$request->kode_mata_pelajaran)->first();
      $Update->kode_mata_pelajaran=$request->kode_mata_pelajaran;
      $Update->kode_guru=$request->kode_guru;
      $Update->hari=$request->hari;
      $Update->jam=$request->jam;
      $Update->nama_pelajaran=$request->nama_pelajaran;
      $Update->save();

      return redirect('mapel')->with(['success'=> 'Berhasil edit Mata Pelajaran']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_mata_pelajaran)
    {
    
        $Delete = mataplajaran::where('kode_mata_pelajaran',$kode_mata_pelajaran)->first();
        $Delete->delete();

        return redirect('mapel')->with(['success'=>'Proses Delete Berhasil']);
    }
}
