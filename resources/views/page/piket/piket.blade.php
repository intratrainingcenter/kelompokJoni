@extends('backend.index')
@section('contain')
  <section class="content-header">
    <h1>
      Piket
      <small>Wani piro !!!!</small>
    </h1>
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
              <a class="btn btn-success" title="add" data-toggle="modal" data-target="#AddPiket" style="float:right;" href="#">Add</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>#</th>
                <th>Kode Piket</th>
                <th>Hari</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Opsi</th>
              </tr>
              <tbody>
            @foreach($data as $index => $key)
              <tr>
              <td>$index+1</td>
                <td>$key->kode_piket</td>
                <td>$key->hari</td>
                <td>$key->nis</td>
                <td>$key->nama_siswa</td>
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
  <div id="AddPiket" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {{Form::open(['route' => 'piket.store'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Piket</h4>
        </div>
        <div class="modal-body col-md-12">
        @csrf
          @method('POST')
          {{
            Form::hidden('kode_piket', '',['placeholder'=>'kode','class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('hari', 'Hari', ['class' => 'awesome'])
          }}{{
            Form::text('hari', '',['placeholder'=> 'Anonymous','class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('nis', 'NIS', ['class' => 'awesome'])
          }}{{
            Form::number('nis', '',['placeholder'=> '696969696969','min' => '0','class' => 'form-control','required','autofocus'])
          }}{{
            Form::label('nama_siswa', 'Nama Siswa', ['class' => 'awesome'])
          }}{{
            Form::text('nama_siswa', '',['placeholder'=> 'Your Name', 'class' => 'form-control','required','autofocus'])
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
@endsection

