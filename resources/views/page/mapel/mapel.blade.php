@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Mata Pelajaran
      <small>Wani piro !!!!</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Page Sekolah</a></li>
      <li class="active">Mata Pelajaran</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools">
              <a class="btn btn-success fa fa-plus" title="add" data-toggle="modal" data-target="#AddMataPelajaran" style="float:right;" href="#"></a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Kode Mata Pelajaran</th>
                <th>Nama Pelajaran</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Guru</th>
                <th>Opsi</th>
              </tr>
              <tbody>
            @foreach($data as $index => $key)
              <tr>
              <td>{{$index+1}}</td>
                <td>{{$key->kode_mata_pelajaran}}</td>
                <td>{{$key->nama_pelajaran}}</td>
                <td>{{$key->hari}}</td>
                <td>{{$key->jam}}</td>
                <td>{{$key->nama_guru}}</td>
                <td>
                     <a type="button" class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#EditMataPelajaran{{$key->kode_mata_pelajaran}}" href="#"></a>
                     <a type="button" class="btn btn-danger fa  fa-trash" data-toggle="modal" data-target="#HapusMataPelajaran{{$key->kode_mata_pelajaran}}"></a>
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
  {{-- ---------add------------ --}}
  <div id="AddMataPelajaran" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {{Form::open(['route' => 'mapel.store'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Mata Pelajaran</h4>
        </div>
        <div class="modal-body col-md-12">
        @csrf
          @method('POST')
          {{
            Form::hidden('kode_mata_pelajaran', '',['placeholder'=>'kode','class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('nama_pelajaran', 'Nama Mata Pelajaran', ['class' => 'awesome'])
          }}{{
            Form::text('nama_pelajaran', '',['placeholder'=> 'Nama Pelajaran','class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('hari', 'Hari', ['class' => 'awesome'])
          }}{{ Form::select('hari', [
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabu' => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu'
            ,], null, ['placeholder' => '---unknown---','class' => 'form-control select2','required']) }}{{
            Form::label('jam', 'Jam Pelajaran', ['class' => 'awesome'])
          }}{{
            Form::text('jam', '',['placeholder'=> 'Jam Pelajaran', 'class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('kode_guru', 'Kode Guru', ['class' => 'awesome'])
          }}{{
           Form::select('kode_guru', $selectTeacher, '', ['class' => 'form-control select2','required'])
           }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" title="submit">Submit</button>
        </div>
      </div>
    {{-- </form> --}}
    {{ Form::close() }}
    </div>
  </div>
  @foreach ($data as $key => $Edit)
    <div id="EditMataPelajaran{{$Edit->kode_mata_pelajaran}}" class="modal fade" role="dialog">
      <div class="modal-dialog">
        {!! Form::model($data, ['route' => ['mapel.update',$Edit->kode_mata_pelajaran]]) !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Mata Pelajaran</h4>
          </div>
          <div class="modal-body col-md-12">
            @csrf
            {{ method_field('PUT') }}
            {{
              Form::hidden('kode_mata_pelajaran', $Edit->kode_mata_pelajaran,['placeholder'=>'kode','class' => 'form-control','required','autofocus'])
            }}{{
              Form::hidden('kode_guru', $Edit->kode_guru,['placeholder'=>'kode','class' => 'form-control','required','autofocus'])
            }}{{
              Form::label('nama_pelajaran', 'Nama Pelajaran', ['class' => 'awesome'])
            }}{{
              Form::text('nama_pelajaran', $Edit->nama_pelajaran,['placeholder'=> 'Nama Pelajaran','class' => 'form-control','required'])
            }}{{
              Form::label('hari', 'hari', ['class' => 'awesome'])
            }}{{ Form::select('hari', [
              $Edit->hari => $Edit->hari,
              'Senin' => 'Senin',
              'Selasa' => 'Selasa',
              'Rabu' => 'Rabu',
              'Kamis' => 'Kamis',
              'Jumat' => 'Jumat',
              'Sabtu' => 'Sabtu'
              ,], null, ['class' => 'form-control select2','required']) }}
              {{
              Form::label('jam', 'jam', ['class' => 'awesome'])
            }}{{
              Form::text('jam', $Edit->jam,['placeholder'=> 'Jam Pelajaran','class' => 'form-control','required'])
            }}{{ form::label('guru', 'Guru',['class'=>'awesome']) }}
            <select class="form-control" name="kode_guru">
              <option value="{{$Edit->kode_guru}}">{{ $Edit->nama_guru }}</option>
              @foreach ($dataTeacher as $teacher )
                <option value="{{ $teacher->kode_guru}}">{{  $teacher->nama_guru }}</option>
              @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" title="update">Edit</button>
          </div>
        </div>
        {{-- </form> --}}
    {{ Form::close() }}
        </div>
    </div>
    @endforeach
    @foreach ($data as $delete)
    <div id="HapusMataPelajaran{{$delete->kode_mata_pelajaran}}" class="modal fade" role="dialog">
      <div class="modal-dialog">
        {!! Form::model($data, ['route' => ['mapel.destroy',$delete->kode_mata_pelajaran]]) !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Mata Pelajaran</h4>
          </div>
          <div class="modal-body col-md-12">
            @csrf
            @method('DELETE')
            <center><h3>Apakah Anda Yakin menghapus ???</h3></center>
            <center><b><h2>" {{$delete->nama_pelajaran}} "</h2></b></center>
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
