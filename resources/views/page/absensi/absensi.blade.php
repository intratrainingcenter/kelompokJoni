@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Absensi
      <small>Wani piro !!!!</small>
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
              <a class="btn btn-success" title="add" data-toggle="modal" data-target="#AddAbsensi" style="float:right;" href="#">Add</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Kode Absensi</th>
                <th>NIS</th>
                <th>Alpa</th>
                <th>Ijin</th>
                <th>Sakit</th>
                <th>Masuk</th>
                <th>Keterangan</th>
                <th>Opsi</th>
              </tr>
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
                      {{-- <a type="button" class="btn btn-warning" title="edit" href="{{route('absensi.edit',$key->kode_absensi)}}">edit</a> --}}
                      <a type="button" class="btn btn-warning" title="edit" data-toggle="modal" data-target="#EditAbsensi{{ $key->kode_absensi }}" href="#">edit</a>
                      <a type="button" class="btn btn-danger" title="hapus" data-toggle="modal" data-target="#HapusAbsensi{{$key->kode_absensi}}" href="#">delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tr>
              </tr>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
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
          {{  Form::select('nis', $selectsiswa, null, ['class' => 'form-control select2','required','autofocus']) }}
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
    {{-- </form> --}}
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
          {{  Form::label('nis', '', ['class' => 'awesome']) }}
          <select class="form-control" name="nis">
            <option value="{{ $Edit->nis }}">{{ $Edit->nama }}</option>
            @foreach ($datasiswa as $Editselect)
              <option value="{{ $Editselect->nis }}">{{ $Editselect->nama }}</option>
            @endforeach
          </select>
          {{-- {{  Form::select('nis', $selectsiswa, null, ['class' => 'form-control select2','required','autofocus']) }} --}}
          {{  Form::label('alpa', 'Alpa', ['class' => 'awesome']) }}
          {{  Form::number('alpa', $Edit->alpa,['placeholder'=>'MIPA_1','min'=>'0','class' => 'form-control','required']) }}
          {{  Form::label('ijin', 'Ijin', ['class' => 'awesome']) }}
          {{  Form::number('ijin', $Edit->ijin,['placeholder'=>'MIPA_1','min'=>'0','class' => 'form-control','required']) }}
          {{  Form::label('sakit', 'Sakit', ['class' => 'awesome']) }}
          {{  Form::number('sakit', $Edit->sakit,['placeholder'=> 'kelas ilmu pengetahun alam','min'=>'0','class' => 'form-control','required']) }}
          {{  Form::label('masuk', 'Masuk', ['class' => 'awesome']) }}
          {{  Form::number('masuk', $Edit->masuk,['placeholder'=> 'kelas ilmu pengetahun alam','min'=>'0','class' => 'form-control','required']) }}
          {{  Form::label('keterangan', 'keterangan', ['class' => 'awesome']) }}
          {{  Form::text('keterangan', $Edit->keterangan,['placeholder'=> 'kelas ilmu pengetahun alam','class' => 'form-control','required']) }}
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
