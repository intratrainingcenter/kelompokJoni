@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Kelas
      <small>Data kelas !!!!</small>
    </h1>
    @if ($message = Session::get('success'))
      <div style="width:300px;float:right" class="alert alert-success alert-block notif">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    @if ($message = Session::get('fatal'))
      <div style="width:300px;float:right" class="alert alert-danger alert-block notif">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    @if ($message = Session::get('info'))
      <div style="width:300px;float:right" class="alert alert-info alert-block notif">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Page Sekolah</a></li>
      <li class="active">Kelas</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools">
              <a class="btn btn-success" title="add" data-toggle="modal" data-target="#AddKelas" style="float:right;" href="#">Add</a>
            </div>
          </div>
          <!-- /.box-header -->
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
                      <a type="button" class="btn btn-warning" title="edit" data-toggle="modal" data-target="#EditKelas{{$key->kode_kelas}}" href="#">edit</a>
                      <a type="button" class="btn btn-danger" title="hapus" data-toggle="modal" data-target="#HapusKelas{{$key->kode_kelas}}" href="#">delete</a>
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
  <!-- Modal -->
  <div id="AddKelas" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {{Form::open(['route' => 'kelas.store'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Kelas</h4>
        </div>
        <div class="modal-body col-md-12">
          {{  Form::hidden('kode_kelas', '',['class' => 'form-control','required']) }}
          {{  Form::label('nama_kelas', 'Nama Kelas', ['class' => 'awesome']) }}
          {{  Form::text('nama_kelas', '',['placeholder'=>'MIPA_1','class' => 'form-control','required','autofocus']) }}
          {{  Form::label('wali_kelas', '', ['class' => 'awesome']) }}
          {{  Form::select('wali_kelas', $selectGuru , null, ['class' => 'form-control select2','required']) }}
          {{  Form::label('keterangan_kelas', '', ['class' => 'awesome']) }}
          {{  Form::textarea('keterangan_kelas', '',['placeholder'=> 'kelas ilmu pengetahun alam','class' => 'form-control','required']) }}
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
@foreach ($data as $Editkelas)
  <div id="EditKelas{{ $Editkelas->kode_kelas }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {!! Form::model($data, ['route' => ['kelas.update',$Editkelas->kode_kelas]])!!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Kelas</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          {{ method_field('PUT') }}
          {{  Form::hidden('kode_kelas', "$Editkelas->kode_kelas",['class' => 'form-control','required']) }}
          {{  Form::label('nama_kelas', 'Nama Kelas', ['class' => 'awesome']) }}
          {{  Form::text('nama_kelas', "$Editkelas->nama_kelas",['placeholder'=>'MIPA_1','class' => 'form-control','required']) }}
          {{  Form::label('wali_kelas', '', ['class' => 'awesome']) }}
          <select class="form-control" name="wali_kelas">
            <option value="{{ $Editkelas->kode_guru }}">{{ $Editkelas->nama_guru }}</option>
            @foreach ($dataguru as $select)
              <option value="{{ $select->kode_guru }}">{{ $select->nama_guru }}</option>
            @endforeach
          </select>
          {{  Form::label('keterangan_kelas', '', ['class' => 'awesome']) }}
          {{  Form::textarea('keterangan_kelas', "$Editkelas->keterangan_kelas",['placeholder'=> 'kelas ilmu pengetahun alam','class' => 'form-control','required']) }}
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" title="update" >Update</button>
        </div>
      </div>
    {{-- </form> --}}
    {{ Form::close() }}
    </div>
  </div>
@endforeach
@foreach ($data as $delete)
  <div id="HapusKelas{{$delete->kode_kelas}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      {!! Form::model($data, ['route' => ['kelas.destroy',$delete->kode_kelas]]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Kelas</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('DELETE')
          <center><h3>Apakah Anda Yakin menghapus ???</h3></center>
          <center><b><h2>" {{$delete->nama_kelas}} "</h2></b></center>
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
