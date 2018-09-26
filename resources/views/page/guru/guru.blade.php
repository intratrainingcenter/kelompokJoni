@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Guru
      <small>Data guru !!!!</small>
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
      <li class="active">Guru</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            <div class="box-tools">
              <a class="btn btn-success fa fa-plus" title="add" data-toggle="modal" data-target="#AddGuru" style="float:right;" href="#"></a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Kode Guru</th>
                <th>Nama Guru</th>
                <th>No Hp</th>
                <th>Opsi</th>
              </tr>
              <tbody>
                @foreach ($data as $idx => $key)
                  <tr>
                    <td>{{$idx +1}}</td>
                    <td>{{$key->kode_guru}}</td>
                    <td>{{$key->nama_guru}}</td>
                    <td>{{$key->no_tlf}}</td>
                    <td>
                      <a type="button" title="edit" class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#EditGuru{{$key->kode_guru}}" href="#"></a>
                      <a type="button" title="delete" class="btn btn-danger fa  fa-trash" data-toggle="modal" data-target="#HapusGuru{{$key->kode_guru}}" href="#"></a>
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

  <div id="AddGuru" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {{Form::open(['route' => 'guru.store'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Guru</h4>
        </div>
        <div class="modal-body col-md-12">
          @csrf
          @method('POST')
          {{
            Form::hidden('kode_guru', '',['placeholder'=>'kode','class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('nama_guru', 'Nama Guru', ['class' => 'awesome'])
          }}{{
            Form::text('nama_guru', '',['placeholder'=> 'supratman spd','class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('no_tlf', 'No Hp', ['class' => 'awesome'])
          }}{{
            Form::number('no_tlf', '',['placeholder'=>'087 XXX XXX','min'=>'0','class' => 'form-control','required','autofocus'])
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
  @foreach ($data as $key => $Edit)
    <div id="EditGuru{{$Edit->kode_guru}}" class="modal fade" role="dialog">
      <div class="modal-dialog">
          {!! Form::model($data, ['route' => ['guru.update',$Edit->kode_guru]]) !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Update Guru</h4>
          </div>
          <div class="modal-body col-md-12">
            @csrf
            {{ method_field('PUT') }}
            {{
              Form::hidden('kode_guru', $Edit->kode_guru,['placeholder'=>'kode','class' => 'form-control','required','autofocus'])
            }}{{
              Form::label('nama_guru', 'Nama Guru', ['class' => 'awesome'])
            }}{{
              Form::text('nama_guru', $Edit->nama_guru,['placeholder'=> 'supratman spd','class' => 'form-control','required'])
            }}{{
              Form::label('no_tlf', 'No Hp', ['class' => 'awesome'])
            }}{{
              Form::number('no_tlf', $Edit->no_tlf,['placeholder'=>'087 XXX XXX','min'=>'0','class' => 'form-control','required'])
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
  @foreach ($data as $delete)
    <div id="HapusGuru{{$delete->kode_guru}}" class="modal fade" role="dialog">
      <div class="modal-dialog">
        {!! Form::model($data, ['route' => ['guru.destroy',$delete->kode_guru]]) !!}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete SIswa</h4>
          </div>
          <div class="modal-body col-md-12">
            @csrf
            @method('DELETE')
            <center><h3>Apakah Anda Yakin menghapus ???</h3></center>
            <center><b><h2>" {{$delete->nama_guru}} "</h2></b></center>
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
