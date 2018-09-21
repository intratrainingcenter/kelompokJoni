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
            <h3 class="box-title">Responsive Hover Table</h3>
            <div class="box-tools">
              <a class="btn btn-success" data-toggle="modal" data-target="#AddSiswa" style="float:right;" href="#">Add</a>
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
                    <td>
                      <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#Editsiswa{{$key->nis}}" href="#">edit</a>
                      <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#Hapussiswa{{$key->nis}}" href="#">delete</a>
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
            Form::text('nama', '',['placeholder'=>'ahmad','class' => 'form-control','required'])
          }}{{
            Form::label('jenis_kelamin', 'Jenis kelamin', ['class' => 'awesome'])
          }}<br>{{
            Form::select('jenis_kelamin', [
                '' => '------unknown---',
                'laki-laki' => 'laki-laki',
                'perempuan' => 'perempuan',
            ], ['class' => 'form-control select2','required'])
          }}<br>{{
            Form::label('no_hp', 'No Hp', ['placeholder'=> '0877xxxxx','class' => 'awesome'])
          }}{{
            Form::number('no_hp', '',['placeholder'=> 'Tempat lahir','class' => 'form-control','required'])
          }}{{
            Form::label('alamat', 'Alamat', ['class' => 'awesome'])
          }}{{
            Form::text('alamat', '',['placeholder'=>'Dk.tanjung 01/04 Ds.kedungtuban Kb.blora','class' => 'form-control','required'])
          }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" >submit</button>
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
          }}<br>{{
            Form::select('jenis_kelamin', [
              "$Edit->jenis_kelamin" => "$Edit->jenis_kelamin",
              'laki-laki' => 'laki-laki',
              'perempuan' => 'perempuan',
            ], ['class' => 'form-control select2','required'])
          }}<br>{{
            Form::label('no_hp', 'No Hp', ['placeholder'=> '0877xxxxx','class' => 'awesome'])
          }}{{
            Form::number('no_hp', "$Edit->no_hp",['placeholder'=> 'Tempat lahir','class' => 'form-control','required'])
          }}{{
            Form::label('alamat', 'Alamat', ['class' => 'awesome'])
          }}{{
            Form::text('alamat', "$Edit->alamat",['placeholder'=>'Dk.tanjung 01/04 Ds.kedungtuban Kb.blora','class' => 'form-control','required'])
          }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" >Update</button>
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
      {!! Form::model($data, ['route' => ['siswa.destroy',$Edit->nis]]) !!}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete SIswa</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('DELETE')
          <center><h3>Apakah Anda Yakin menghapus ???</h3></center>
          <center><b><h2>{{$delete->nama}}</h2></b></center>
        <hr>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" >Delete</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endforeach

@endsection
