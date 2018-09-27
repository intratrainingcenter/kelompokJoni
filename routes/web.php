<?php

// Route::get('/', 'Controllerbiasa@Tampilkosngan');
// Route::get('/test/{id}',function($id){
//   return $id;
// });
// Route::get('/biasa/{id}', 'Controllerbiasa@index')->name('bis')->middleware('check');
// Route::get('/biasa', 'Controllerbiasa@tampil')->middleware('check');
// // Route::resource('risource', 'ControllerResource')->middleware('Goto');
// Route::resource('risource', 'ControllerResource');

// Route::get('/', function (){
//   return view('backend/contents');
// });
Route::get('/header', function (){
  return view('backend/data1');
});
Route::get('/contain', function (){
  return view('backend/menu');
});
Route::get('/', 'Controllerbiasa@index')->name('Dhasboard');
// Route::get('/absensi', 'PageSekolah@absensi')->name('absensi');
// Route::get('/mapel', 'PageSekolah@mapel')->name('mapel');
// Route::get('/kelas', 'PageSekolah@kelas')->name('kelas');
// Route::get('/piket', 'PageSekolah@piket')->name('piket');
Route::resource('siswa', 'DataSiswaController');
Route::resource('kelas', 'KelasController');
Route::resource('absensi', 'AbsensiController');
Route::resource('guru', 'GuruController');
Route::resource('picket', 'PiketController');

Route::get('mapel', 'MataPelajaranController@index')->name('mapel');
Route::post('mapel/save', 'MataPelajaranController@store')->name('mapel.store');
Route::put('mapel/edit/{id}', 'MataPelajaranController@update')->name('mapel.update');
Route::delete('mapel/delete/{id}', 'MataPelajaranController@destroy')->name('mapel.destroy');
