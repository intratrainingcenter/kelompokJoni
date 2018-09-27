@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Absensi
      <small>Data Absensi siswa !!!!</small>
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
              {{-- <a class="btn btn-info" title="Info Absensi" style="float:right;" href="#">Info Absensi</a> --}}
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
              <table id="myTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>No Hp</th>
                  <th>Alamat</th>
                  <th>Kelas</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dataStudent as $idx => $key)
                  <tr>
                    <td>{{$idx +1}}</td>
                    <td>{{$key->nis}}</td>
                    <td>{{$key->nama}}</td>
                    <td>{{$key->jenis_kelamin}}</td>
                    <td>{{$key->no_hp}}</td>
                    <td>{{$key->alamat}}</td>
                    <td>{{$key->nama_kelas}}</td>
                    <td>
                      <a type="button" title="delete" class="btn btn-success" data-toggle="modal" data-target="#Absensiswa{{$key->nis}}" href="#">absensi</a>
                      <a type="button" title="delete" class="btn btn-info" href="{{ route('absensi.show',$key->nis)}}">info absensi</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tr>
              </tr>
            </table>
          </div>
          <a href="{{ route('absensi.index') }}" title="Back" class="btn btn-danger">Back</a>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  @foreach ($dataStudent as $Edit)
    <div id="Absensiswa{{ $Edit->nis }}" class="modal fade" role="dialog">
      <div class="modal-dialog">
        {{Form::open(['route' => 'absensi.store'])}}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Absensi</h4>
          </div>
          <div class="modal-body col-md-12">
            <center > <h3>{{$Edit->nama}} </h3></center> <br>
            {{  Form::hidden('kode_absensi', '',['class' => 'form-control','required']) }}
            {{  Form::hidden('nis', $Edit->nis,['class' => 'form-control','required']) }}
            {{ Form::checkbox('alpa', '1') }}
            {{  Form::label('alpa', 'Alpa', ['class' => 'awesome']) }}
            {{ Form::checkbox('ijin', '1') }}
            {{  Form::label('ijin', 'Ijin', ['class' => 'awesome']) }}
            {{ Form::checkbox('sakit', '1') }}
            {{  Form::label('sakit', 'Sakit', ['class' => 'awesome']) }}
            {{ Form::checkbox('masuk', '1') }}
            {{  Form::label('masuk', 'Masuk', ['class' => 'awesome']) }}<br>
            {{  Form::label('keterangan', 'keterangan', ['class' => 'awesome']) }}
            {{  Form::textarea('keterangan', '',['placeholder'=> 'kelas ilmu pengetahun alam','class' => 'form-control','required']) }}
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" title="update" >Update</button>
          </div>
        </div>
  {{ Form::close() }}
      </div>
    </div>
  @endforeach
@endsection
