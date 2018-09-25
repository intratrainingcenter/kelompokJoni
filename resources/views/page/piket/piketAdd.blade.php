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
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            {{Form::open(['route' => 'picket.store'])}}
          <div class="modal-content">

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
                'Rabo' => 'Rabo',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu'
                ,], null, ['placeholder' => '---unknown---','class' => 'form-control select2','required']) }}
              {{
                Form::label('nis', 'Nama Siswa', ['class' => 'awesome'])
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
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
@endsection
