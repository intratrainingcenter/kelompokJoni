<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
use App\Guru;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kelas::join('gurus','gurus.kode_guru','=','kelas.wali_kelas')->orderBy('kelas.id','DESC')->get();
        $dataTeacher = Guru::all();
        $selectTeacher = [''=>'pilih guru ---'];
        foreach ($dataTeacher as $select) {
          $selectTeacher[$select->kode_guru] = $select->nama_guru;
        }
        return view('page.kelas.kelas',['data'=>$data, 'selectTeacher'=>$selectTeacher, 'dataTeacher'=>$dataTeacher]);
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

      // dd($request->wali_kelas);
      if ($request->wali_kelas == '') {
        // code...
        return redirect('kelas')->with(['fatal' => 'wali kelas Tidak boleh kosong']);
      }else {

      $code = date("Ymdhis");
      $count = kelas::count()+1;

      // dd('n'.$code.$count);
      $insert = new kelas;
      $insert->kode_kelas='K-'.$code.$count;
      $insert->nama_kelas=$request->nama_kelas;
      $insert->wali_kelas=$request->wali_kelas;
      $insert->keterangan_kelas=$request->keterangan_kelas;
      $insert->save();

      return redirect('kelas')->with(['success' => 'Proses penambahan Berhasil']);
      }
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
    public function update(Request $request, $kode_kelas)
    {
      // dd($request->kode_kelas);
      $insert = kelas::where('kode_kelas',$request->kode_kelas)->first();
      $insert->kode_kelas=$request->kode_kelas;
      $insert->nama_kelas=$request->nama_kelas;
      $insert->wali_kelas=$request->wali_kelas;
      $insert->keterangan_kelas=$request->keterangan_kelas;
      $insert->save();

      return redirect('kelas')->with(['success' => 'Proses Edit Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_kelas)
    {
        // dd($kode_kelas);
        $delete = kelas::where('kode_kelas',$kode_kelas);
        $delete->delete();

        return redirect('kelas')->with(['success' => 'Proses Hapus Berhasil']);
    }
}
