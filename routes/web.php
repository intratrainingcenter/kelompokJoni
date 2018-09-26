<?php

// Route::get('/', 'Controllerbiasa@Tampilkosngan');
// Route::get('/test/{id}',function($id){
//   return $id;
// });
// Route::get('/biasa/{id}', 'Controllerbiasa@index')->name('bis')->middleware('check');
// Route::get('/biasa', 'Controllerbiasa@tampil')->middleware('check');
// // Route::resource('risource', 'ControllerResource')->middleware('Goto');
// Route::resource('risource', 'ControllerResource');

Route::get('/', function (){
  return view('backend/contents');
});
Route::get('/header', function (){
  return view('backend/header');
});
Route::get('/contain', function (){
  return view('backend/menu');
});
// Route::get('/siswa', 'PageSekolah@datasiswa')->name('siswa');
// Route::get('/absensi', 'PageSekolah@absensi')->name('absensi');
// Route::get('/mapel', 'PageSekolah@mapel')->name('mapel');
// Route::get('/kelas', 'PageSekolah@kelas')->name('kelas');
// Route::get('/piket', 'PageSekolah@piket')->name('piket');
Route::resource('siswa', 'DataSiswaController');
Route::resource('kelas', 'KelasController');
Route::resource('absensi', 'AbsensiController');
Route::resource('guru', 'GuruController');
Route::get('piket', 'PiketController@index')->name('piket');
Route::post('piket/save', 'PiketController@store')->name('piket.store');
Route::get('mapel', 'MataPelajaranController@index')->name('mapel');
Route::post('mapel/save', 'MataPelajaranController@store')->name('mapel.store');
Route::put('mapel/edit/{id}', 'MataPelajaranController@update')->name('mapel.update');
Route::delete('mapel/delete/{id}', 'MataPelajaranController@destroy')->name('mapel.destroy');