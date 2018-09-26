@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Absensi
      <small>Data Absensi Kelas !!!!</small>
    </h1>
    @if ($message = Session::get('success'))
      <div style="width:300px;float:right" class="alert alert-success alert-block notif">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Page Sekolah</a></li>
      <li class="active">Absensi</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools">
            </div>
          </div>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Kode Kelas</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Keterangan Kelas</th>
                <th>Opsi</th>
              </tr>
              <tbody>
                @foreach ($data as $idx => $key)
                  <tr>
                    <td>{{$idx +1}}</td>
                    <td>{{$key->kode_kelas}}</td>
                    <td>{{$key->nama_kelas}}</td>
                    <td>{{$key->nama_guru}}</td>
                    <td>{{$key->keterangan_kelas}}</td>
                    <td>
                      <a type="button" class="btn btn-success" title="edit" href="{{route('absensi.edit',$key->kode_kelas)}}">Absens</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tr>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
