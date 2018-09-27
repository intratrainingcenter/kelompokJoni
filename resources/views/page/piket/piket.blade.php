@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Piket
      <small>Data Piket !!!!</small>
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
            <h3 class="box-title"></h3>
            <div class="box-tools">
            </div>
          </div>
          <div class="box-body table-responsive no-padding">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  {{-- <th>Kode Piket</th> --}}
                  {{-- <th>Hari</th> --}}
                  <th>kelas</th>
                  <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $idx => $key)
                <tr>
                  <td>{{$idx +1}}</td>
                  {{-- <td>{{$key->kode_piket}}</td> --}}
                  {{-- <td>{{$key->hari}}</td> --}}
                  <td>{{$key->nama_kelas}}</td>
                  <td>
                    <a type="button" title="edit" class="btn btn-info" data-toggle="modal" href="{{route('picket.show',$key->kode_kelas)}}">detail piket</a>
                    </td>
                </tr>
              @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Modal -->
{{-- ---------add------------ --}}
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
            Form::label('kode_kelas', 'kelas', ['class' => 'awesome'])
          }}{{ Form::select('kode_kelas', $selectClass, null, ['class' => 'form-control select2','required']) }}
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
