@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Siswa
      <small>Data siwsa !!!!</small>
    </h1>
    @if ($message = Session::get('success'))
      <div style="width:300px;float:right" class="alert alert-success alert-block notif">
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
    @if ($message = Session::get('fail'))
      <div style="width:300px;float:right" class="alert alert-danger alert-block notif">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Page Sekolah</a></li>
      <li class="active">data siswa</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools">
              <a class="btn btn-success fa fa-plus" title="add" data-toggle="modal" data-target="#AddSiswa" style="float:right;" href="#"></a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
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
              <tbody>
                @foreach ($data as $idx => $key)
                  <tr>
                    <td>{{$idx +1}}</td>
                    <td>{{$key->nis}}</td>
                    <td>{{$key->nama}}</td>
                    <td>{{$key->jenis_kelamin}}</td>
                    <td>{{$key->no_hp}}</td>
                    <td>{{$key->alamat}}</td>
                    <td>{{$key->nama_kelas}}</td>
                    <td>
                      <a type="button" title="edit" class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#Editsiswa{{$key->nis}}" href="#"></a>
                      <a type="button" title="delete" class="btn btn-danger fa  fa-trash" data-toggle="modal" data-target="#Hapussiswa{{$key->nis}}" href="#"></a>
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
{{-- ---------add------------ --}}
  <div id="AddSiswa" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {{Form::open(['route' => 'siswa.store'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Siswa</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('POST')
          {{
            Form::hidden('nis', 'NIS', ['class' => 'awesome'])
          }}{{
            Form::hidden('nis', '',['type'=>'hidden','placeholder'=>'N2018092101','class' => 'form-control','required'])
          }}{{
            Form::label('nama', 'Nama', ['class' => 'awesome'])
          }}{{
            Form::text('nama', '',['placeholder'=>'ahmad','class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('jenis_kelamin', 'Jenis kelamin', ['class' => 'awesome'])
          }}{{ Form::select('jenis_kelamin', [
                          'laki-laki' => 'laki-laki',
                          'perempuan' => 'perempuan'
            ,], null, ['placeholder' => '---unknown---','class' => 'form-control select2','required']) }}
          {{
            Form::label('kode_kelas', 'kode kelas', ['class' => 'awesome'])
          }}{{ Form::select('kode_kelas', $selectClass, null, ['class' => 'form-control select2','required']) }}
          {{
            Form::label('no_hp', 'No Hp', ['class' => 'awesome'])
          }}{{
            Form::number('no_hp', '',['placeholder'=> '0877xxxxx','min'=>'0','class' => 'form-control','required'])
          }}{{
            Form::label('alamat', 'Alamat', ['class' => 'awesome'])
          }}{{
            Form::textarea('alamat', '',['placeholder'=>'Dk.tanjung 01/04 Ds.kedungtuban Kb.blora','class' => 'form-control','required'])
          }}
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

  {{-- ------------Edit------------- --}}
@foreach ($data as $key => $Edit)
  <div id="Editsiswa{{$Edit->nis}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {!! Form::model($data, ['route' => ['siswa.update',$Edit->nis]]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Siswa</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          {{ method_field('PUT') }}
          {{
            Form::hidden('nis', 'NIS', ['class' => 'awesome'])
          }}{{
            Form::hidden('nis', "$Edit->nis",['type'=>'hidden','placeholder'=>'N2018092101','class' => 'form-control','required'])
          }}{{
            Form::label('nama', 'Nama', ['class' => 'awesome'])
          }}{{
            Form::text('nama', "$Edit->nama",['placeholder'=>'ahmad','class' => 'form-control','required'])
          }}{{
            Form::label('jenis_kelamin', 'Jenis kelamin', ['class' => 'awesome'])
          }}{{ Form::select('jenis_kelamin', [
                          "$Edit->jenis_kelamin" => "$Edit->jenis_kelamin",
                          'laki-laki' => 'laki-laki',
                          'perempuan' => 'perempuan'
            ,], null, ['class' => 'form-control select2','required']) }}
            {{
              Form::label('kode_kelas', 'kode kelas', ['class' => 'awesome'])
            }}
            <select class="form-control" name="kode_kelas">
              <option value="{{$Edit->kode_kelas}}">{{ $Edit->nama_kelas }}</option>
              @foreach ($dataClass as $key => $kelas)
                <option value="{{$kelas->kode_kelas}}">{{ $kelas->nama_kelas }}</option>
              @endforeach
            </select>
          {{
            Form::label('no_hp', 'No Hp', ['class' => 'awesome'])
          }}{{
            Form::number('no_hp', "$Edit->no_hp",['min'=>'0','placeholder'=> '0877xxxxx','class' => 'form-control','required'])
          }}{{
            Form::label('alamat', 'Alamat', ['class' => 'awesome'])
          }}{{
            Form::textarea('alamat', "$Edit->alamat",['placeholder'=>'Dk.tanjung 01/04 Ds.kedungtuban Kb.blora','class' => 'form-control','required'])
          }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" title="update" >Update</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endforeach
{{-- ------------delete------------- --}}
@foreach ($data as $delete)
  <div id="Hapussiswa{{$delete->nis}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      {!! Form::model($data, ['route' => ['siswa.destroy',$delete->nis]]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete SIswa</h4>
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
