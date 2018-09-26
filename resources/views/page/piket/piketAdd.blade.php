@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>

      <small></small>
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
      <li class="active">Piket</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Picket</h3>
            <div class="box-tools">
              <a class="btn btn-success" title="add" data-toggle="modal" data-target="#AddPicket" style="float:right;" href="#">Add</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Kode Piket</th>
                <th>Hari</th>
                <th>kelas</th>
                <th>nama</th>
                <th>Opsi</th>
              </tr>
              <tbody>
                @foreach ($data as $idx => $key)

                  <tr>
                    <td>{{$idx +1}}</td>
                    <td>{{$key->kode_piket}}</td>
                    <td>{{$key->hari}}</td>
                    <td>{{$key->nama_kelas}}</td>
                    <td>{{$key->nama}}</td>
                    <td>
                      {{-- <a type="button" title="edit" class="btn btn-warning" data-toggle="modal" href="{{route('picket.edit',$key->kode_piket)}}">edit</a> --}}
                      <a type="button" title="edit" class="btn btn-warning" data-toggle="modal" data-target="#EditPicket{{$key->kode_piket}}" href="#">edit</a>
                      <a type="button" title="delete" class="btn btn-danger" data-toggle="modal" data-target="#DeletePicket{{$key->kode_piket}}" href="#">delete</a>
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

  <div id="AddPicket" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {{Form::open(['route' => 'picket.store'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Siswa</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('POST')
        {{
            Form::hidden('kode_piket', '',['type'=>'hidden','placeholder'=>'N2018092101','class' => 'form-control','required'])
          }}{{
            Form::label('Hari', 'Hari', ['class' => 'awesome'])
          }}{{ Form::select('hari', [
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabu' => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu'
            ,], null, ['placeholder' => '---unknown---','class' => 'form-control select2','required']) }}
          {{
             // Form::('kode_kelas', $selectClass, null, ['class' => 'form-control select2','required'])
             Form::hidden('kode_kelas', $dataKode,['placeholder'=>'N2018092101','class' => 'form-control','required'])
           }}
          {{
            Form::label('nis', 'NIS', ['class' => 'awesome'])
          }}{{ Form::select('nis', $selectStudent, null, ['class' => 'form-control select2','required']) }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" title="submit" >Submit</button>
        </div>
      </div>
    {{-- </form> --}}
    {{ Form::close() }}
    </div>
  </div>
  @foreach ($data as $key => $edit)
  <div id="EditPicket{{$edit->kode_piket}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {!! Form::model($data, ['route' => ['picket.update',$edit->kode_piket]]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Siswa</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('PUT')
        {{
            Form::hidden('kode_piket', $edit->kode_piket,['class' => 'form-control','required'])
          }}
        {{
            Form::hidden('nis', $edit->nis,['class' => 'form-control','required'])
          }}
        {{
            Form::hidden('kode_kelas', $edit->kode_kelas ,['class' => 'form-control','required'])
          }}{{
            Form::label('Hari', 'Hari', ['class' => 'awesome'])
          }}{{ Form::select('hari', [
            $edit->hari => $edit->hari,
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabo' => 'Rabo',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu'
            ,], null, ['class' => 'form-control select2','required']) }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" title="submit" >Submit</button>
        </div>
      </div>
    {{-- </form> --}}
    {!! Form::close() !!}
    </div>
  </div>
@endforeach
  @foreach ($data as $delete)
    <div id="DeletePicket{{$delete->kode_piket}}" class="modal fade" role="dialog">
      <div class="modal-dialog">
        {!! Form::model($data, ['route' => ['picket.destroy',$delete->kode_piket]]) !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete SIswa</h4>
          </div>
          <div class="modal-body col-md-12">
            @csrf
            @method('DELETE')
            <center><h3>Apakah Anda Yakin menghapus ???</h3></center>
            <center><b><h2>" {{$delete->hari}} "</h2></b></center>
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
