<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\piket;
use App\datasiswa;

class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = piket::join('datasiswas','datasiswas.nis','=','pikets.nis')->orderBy('pikets.id','DESC')->get();
        // dd($data);
        $dataStudent = datasiswa::all();
        $selectStudent = [''=>'pilih siswa'];
        foreach ($dataStudent as $key => $select) {
          $selectStudent[$select->nis]=$select->nama;
        }
        return view('page.piket.piket',['data'=>$data,'selectStudent'=>$selectStudent,'dataStudent'=>$dataStudent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $dataStudent = datasiswa::all();
      $selectStudent = [''=>'pilih siswa'];
      foreach ($dataStudent as $key => $select) {
        $selectStudent[$select->nis]=$select->nama;
      }
      return view('page.piket.piketAdd',['selectStudent'=>$selectStudent,'dataStudent'=>$dataStudent]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $date = date('Ymdhi');
        $count= piket::count()+1;

        $insert = new piket;
        $insert->kode_piket = 'Pkt-'.$date.$count;
        $insert->hari=$request->hari;
        $insert->nis=$request->nis;
        $insert->save();

        return redirect('picket')->with(['success'=>'Proses Tambah Piket berhasil ']);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_piket)
    {
        $delete = piket::where('kode_piket',$kode_piket);
        $delete->delete();

        return redirect('picket')->with(['success'=>'Proses Delete telah Perhasil']);
    }
}
