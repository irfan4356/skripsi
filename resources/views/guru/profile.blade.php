@extends('include.head')

@section('content')

<div class="content-wrapper mt-3" >

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('adminlte/dist/img/user4-128x128.jpg')}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$guru->nama_guru}}</h3>

              <p class="text-muted text-center">Guru</p>

              
              <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary">
            <div class="card-header p-2">
                <h3 class="card-title">Data Diri</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <ul class="list-group list-group-unbordered mb-6">
                <li class="list-group-item">
                    <b>NIP</b> <span class="float-right text-capitalize">{{ $guru->nip}}</span>
                </li>
                <li class="list-group-item">
                <b>Tempat Lahir</b> <span class="float-right text-capitalize">{{ $guru->tmp_lahir }}</span>
                </li>
                <li class="list-group-item">
                <b>Tanggal Lahir</b> <span class="float-right text-capitalize">{{ $guru->tgl_lahir}}</span>
                </li>
                <li class="list-group-item">
                <b>Agama</b> <span class="float-right text-capitalize">{{ $guru->agama }}</span>
                </li>
                <li class="list-group-item">
                <b>Jenis Kelamin</b> <span class="float-right text-capitalize">{{ $guru->jk }}</span>
                </li>
                <li class="list-group-item">
                  <b>Telepon</b> <span class="float-right text-capitalize">{{ $guru->telp}}</span>
              </li>
                <li class="list-group-item">
                    <b>Email</b> <span class="float-right text-capitalize">{{ $guru->email}}</span>
                </li>
              </ul>
            </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
@endsection