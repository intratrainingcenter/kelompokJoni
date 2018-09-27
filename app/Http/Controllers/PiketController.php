<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\piket;
use App\datasiswa;
use App\kelas;

class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kelas::all();
        // dd($data);
        $dataStudent = datasiswa::all();
        $selectStudent = [''=>'pilih siswa'];
        foreach ($dataStudent as $key => $select) {
          $selectStudent[$select->nis]=$select->nama;
        }
        $dataClass = kelas::all();
        $selectClass = [''=>'pilih kelas'];
        foreach ($dataClass as $key => $select) {
          $selectClass[$select->kode_kelas]=$select->nama_kelas;
          // dd($selectClass);
        }
        return view('page.piket.piket',['data'=>$data,'dataClass'=>$dataClass,'selectClass'=>$selectClass,'selectStudent'=>$selectStudent,'dataStudent'=>$dataStudent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Ymdhi');
        $count= piket::count()+1;

        $insert = new piket;
        $insert->kode_piket = 'Pkt-'.$date.$count;
        $insert->hari=$request->hari;
        $insert->kode_kelas=$request->kode_kelas;
        $insert->nis=$request->nis;
        $insert->save();

        return redirect()->back()->with(['success'=>'Proses Tambah Piket berhasil ']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode_kelas)
    {
      $data = piket::join('kelas','kelas.kode_kelas','=','pikets.kode_kelas')->join('datasiswas','datasiswas.nis','=','pikets.nis')->where('pikets.kode_kelas',$kode_kelas)->orderBy('pikets.id','DESC')->get();
      // $data = piket::join('kelas','kelas.kode_kelas','=','pikets.kode_kelas')->where('pikets.kode_kelas',$kode_kelas)->orderBy('pikets.id','DESC')->get();
      $dataKode = $kode_kelas;
      // dd($dataKode);
    $dataStudent = datasiswa::where('kode_kelas',$kode_kelas)->get();
    $selectStudent = [''=>'pilih siswa'];
    foreach ($dataStudent as $key => $select) {
      $selectStudent[$select->nis]=$select->nama;
    }
    $dataClass = kelas::all();
    $selectClass = [''=>'pilih kelas'];
    foreach ($dataClass as $key => $select) {
      $selectClass[$select->kode_kelas]=$select->nama_kelas;
      // dd($selectClass);
    }
      return view('page.piket.piketAdd',['data'=>$data,'dataKode'=>$dataKode,'dataClass'=>$dataClass,'selectClass'=>$selectClass,'selectStudent'=>$selectStudent,'dataStudent'=>$dataStudent]);
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
        $insert = piket::where('kode_piket',$request->kode_piket)->first();
        $insert->kode_piket =$request->kode_piket;
        $insert->hari=$request->hari;
        $insert->kode_kelas=$request->kode_kelas;
        $insert->nis=$request->nis;
        $insert->save();

        return redirect()->back()->with(['success'=>'Proses Update Piket berhasil']);
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
