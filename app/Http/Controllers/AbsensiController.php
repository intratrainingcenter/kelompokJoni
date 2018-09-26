<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\absensi;
use App\datasiswa;
use App\kelas;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kelas::join('gurus','gurus.kode_guru','=','kelas.wali_kelas')->orderBy('kelas.id', 'DESC')->get();
          $datasiswa = datasiswa::all();
          $selectsiswa = [''=>'Pilih Siswa'];

          foreach ($datasiswa as $item) {
            $selectsiswa[$item->nis] = $item->nama;
          }
        return view('page.absensi.absensi', ['data'=>$data ,'selectsiswa'=> $selectsiswa, 'datasiswa'=>$datasiswa]);
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

        $date = date('Ymdhsi');
        $count = absensi::count()+1;

        // dd($request);
        $insert = new absensi;
        $insert->kode_absensi='Abs-'.$date.$count;
        $insert->nis=$request->nis;
        $insert->alpa=$request->alpa;
        $insert->ijin=$request->ijin;
        $insert->sakit=$request->sakit;
        $insert->masuk=$request->masuk;
        $insert->keterangan=$request->keterangan;
        $insert->save();

        return redirect()->back()->with(['success' => 'Proses Tambah Absensi berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nis)
    {
      $data = absensi::join('datasiswas','datasiswas.nis', '=','absensis.nis')->orderBy('absensis.id', 'DESC')->where('absensis.nis',$nis)->get();
      $datasiswa = datasiswa::all();
      $selectsiswa = [''=>'Pilih Siswa'];

      foreach ($datasiswa as $item) {
        $selectsiswa[$item->nis] = $item->nama;
      }
    return view('page.absensi.absensiDetail', ['data'=>$data ,'selectsiswa'=> $selectsiswa, 'datasiswa'=>$datasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_kelas)
    {
      // dd($kode_kelas);
        // $edit = absensi::join('datasiswas','datasiswas.kode_kelas','=','absensis.kode_kelas')->where('datasiswas.kode_kelas',$kode_kelas)->first();
        $datasiswa = datasiswa::join('kelas','kelas.kode_kelas','=','datasiswas.kode_kelas')
                                // ->join('absensis','absensis.nis','=','datasiswas.nis')
                                ->where('datasiswas.kode_kelas',$kode_kelas)->get();

        return view('page.absensi.absensikelas',['datasiswa'=>$datasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_absensi)
    {
        // dd($request);
        $Update = absensi::where('kode_absensi',$request->kode_absensi)->first();
        $Update->kode_absensi=$request->kode_absensi;
        $Update->nis=$request->nis;
        $Update->alpa=$request->alpa;
        $Update->ijin=$request->ijin;
        $Update->sakit=$request->sakit;
        $Update->masuk=$request->masuk;
        $Update->keterangan=$request->keterangan;
        $Update->save();

        return redirect()->back()->with(['success' => 'Proses Edit Absensi berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_absensi)
    {
        // dd($kode_absensi);
        $delete = absensi::where('kode_absensi',$kode_absensi);
        $delete->delete();

        return redirect()->back()->with(['success' => 'Proses Delete Absensi berhasil']);
    }
}
