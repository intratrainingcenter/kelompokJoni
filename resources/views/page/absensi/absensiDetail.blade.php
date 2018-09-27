@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Absensi
      <small>Data detail Absensi Siswa !!!!</small>
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
            <table id="myTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Absensi</th>
                  <th>Nama Siswa</th>
                  <th>Alpa</th>
                  <th>Ijin</th>
                  <th>Sakit</th>
                  <th>Masuk</th>
                  <th>Keterangan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $idx => $key)
                  <tr>
                    <td>{{$idx +1}}</td>
                    <td>{{$key->kode_absensi}}</td>
                    <td>{{$key->nama}}</td>
                    <td>{{$key->alpa}}</td>
                    <td>{{$key->ijin}}</td>
                    <td>{{$key->sakit}}</td>
                    <td>{{$key->masuk}}</td>
                    <td>{{$key->keterangan}}</td>
                    <td>
                      <a type="button" class="btn btn-warning fa fa-pencil" title="edit" data-toggle="modal" data-target="#EditAbsensi{{ $key->kode_absensi }}" href="#"></a>
                      <a type="button" class="btn btn-danger fa fa-trash" title="hapus" data-toggle="modal" data-target="#HapusAbsensi{{$key->kode_absensi}}" href="#"></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
          <a href="{{ route('absensi.index') }}" title="Back" class="btn btn-danger">Back</a>
        </div>
        </div>
        </div>
  </section>
  <div id="AddAbsensi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {{Form::open(['route' => 'absensi.store'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Absensi</h4>
        </div>
        <div class="modal-body col-md-12">
          {{  Form::hidden('kode_absensi', '',['class' => 'form-control','required']) }}
          {{  Form::label('nis', '', ['class' => 'awesome']) }}
          {{  Form::select('nis', $selectStudent, null, ['class' => 'form-control select2','required','autofocus']) }}
          {{  Form::label('alpa', 'Alpa', ['class' => 'awesome']) }}
          {{  Form::number('alpa', '',['placeholder'=>'1','min'=>'0','class' => 'form-control','required','autofocus']) }}
          {{  Form::label('ijin', 'Ijin', ['class' => 'awesome']) }}
          {{  Form::number('ijin', '',['placeholder'=>'1','min'=>'0','class' => 'form-control','required','autofocus']) }}
          {{  Form::label('sakit', 'Sakit', ['class' => 'awesome']) }}
          {{  Form::number('sakit', '',['placeholder'=> '1','min'=>'0','class' => 'form-control','required','autofocus']) }}
          {{  Form::label('masuk', 'Masuk', ['class' => 'awesome']) }}
          {{  Form::number('masuk', '',['placeholder'=> '1','min'=>'0','class' => 'form-control','required','autofocus']) }}
          {{  Form::label('keterangan', 'keterangan', ['class' => 'awesome']) }}
          {{  Form::text('keterangan', '',['placeholder'=> 'sakit panas , ijin ada pernikahan kakak','class' => 'form-control','required']) }}
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" title="submit" >submit</button>
        </div>
      </div>
    {{ Form::close() }}
    </div>
  </div>

@foreach ($data as $Edit)
  <div id="EditAbsensi{{ $Edit->kode_absensi }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      {!! Form::model($data, ['route' => ['absensi.update',$Edit->kode_absensi]]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Absensi</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('PUT')
          {{  Form::hidden('kode_absensi', $Edit->kode_absensi,['class' => 'form-control','required']) }}
          {{  Form::hidden('nis', $Edit->nis,['class' => 'form-control','required']) }}
          <center>{{  Form::label('nis', $Edit->nama, ['class' => 'awesome']) }}</center>
          @if ($Edit->alpa == 1)
            {{ Form::checkbox('alpa', '1',true) }}
          @else
          {{ Form::checkbox('alpa', '1',false) }}
        @endif
          {{  Form::label('alpa', 'Alpa', ['class' => 'awesome']) }}
          @if ($Edit->ijin == 1)
            {{ Form::checkbox('ijin', '1',true) }}
          @else
          {{ Form::checkbox('ijin', '1',false) }}
        @endif
          {{  Form::label('ijin', 'Ijin', ['class' => 'awesome']) }}
          @if ($Edit->sakit == 1)
            {{ Form::checkbox('sakit', '1',true) }}
          @else
          {{ Form::checkbox('sakit', '1',false) }}
        @endif
          {{  Form::label('sakit', 'Sakit', ['class' => 'awesome']) }}
          @if ($Edit->masuk == 1)
            {{ Form::checkbox('masuk', '1',true ) }}
          @else
          {{ Form::checkbox('masuk', '1',false ) }}
        @endif

          {{  Form::label('masuk', 'Masuk', ['class' => 'awesome']) }}<br>
          {{  Form::label('keterangan', 'keterangan', ['class' => 'awesome']) }}
          {{  Form::textarea('keterangan', $Edit->keterangan,['placeholder'=> 'kelas ilmu pengetahun alam','class' => 'form-control','required']) }}
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
  @foreach ($data as $delete)
    <div id="HapusAbsensi{{$delete->kode_absensi}}" class="modal fade" role="dialog">
      <div class="modal-dialog">
        {!! Form::model($data, ['route' => ['absensi.destroy',$delete->kode_absensi]]) !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Absensi</h4>
          </div>
          <div class="modal-body col-md-12">
            @csrf
            @method('DELETE')
            <center><h3>Apakah Anda Yakin menghapus ???</h3></center>
            <center><b><h2>" {{$delete->nama}} "</h2></b></center>
          {{-- <hr> --}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" title="delete" >Delete</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  @endforeach
@endsection
