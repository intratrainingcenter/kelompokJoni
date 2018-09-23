<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\datasiswa;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('datasiswas')->get();
        // dd($data);
        return view('page/datasiswa/siswa',['data'=>$data]);
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
        $count = datasiswa::count()+1;

        // dd('n'.$code.$count);
        $insert = new datasiswa;
        $insert->nis='N'.$code.$count;
        $insert->nama=$request->nama;
        $insert->jenis_kelamin=$request->jenis_kelamin;
        $insert->no_hp=$request->no_hp;
        $insert->alamat=$request->alamat;
        $insert->save();

        return redirect('siswa')->with(['success' => 'Proses penambahan Berhasil']);
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
    public function update(Request $request, $nis)
    {
        // dd($request['nis']);
        // $update = datasiswa::where('nis',"=",$request['nis']);
        $updates = datasiswa::where('nis',$request['nis'])->first();
        $updates->nis=$request->nis;
        $updates->nama=$request->nama;
        $updates->jenis_kelamin=$request->jenis_kelamin;
        $updates->no_hp=$request->no_hp;
        $updates->alamat=$request->alamat;
        $updates->save();

        return redirect('siswa')->with(['success' => 'Proses Edit Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nis)
    {
        // dd($nis);
        $delete = datasiswa::where('nis',$nis);
        $delete->delete();
        //
        return redirect('siswa')->with(['success' => 'Proses Hapus Berhasil']);
    }
}