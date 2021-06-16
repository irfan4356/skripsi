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

              <h3 class="profile-username text-center">{{$siswaa->nama_siswa}}</h3>

              <p class="text-muted text-center">Siswa</p>

              
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
                    <b>NISN</b> <span class="float-right text-capitalize">{{ $siswaa->nisn}}</span>
                </li>
                <li class="list-group-item">
                <b>Tempat Lahir</b> <span class="float-right text-capitalize">{{ $siswaa->tmp_lahir }}</span>
                </li>
                <li class="list-group-item">
                <b>Tanggal Lahir</b> <span class="float-right text-capitalize">{{ $siswaa->tgl_lahir}}</span>
                </li>
                <li class="list-group-item">
                <b>Agama</b> <span class="float-right text-capitalize">{{ $siswaa->agama }}</span>
                </li>
                <li class="list-group-item">
                <b>Jenis Kelamin</b> <span class="float-right text-capitalize">{{ $siswaa->jk }}</span>
                </li>
                <li class="list-group-item">
                    <b>Kelas</b> <span class="float-right text-capitalize">{{ $siswaa->nama_kelas}}</span>
                </li>
              </ul>
            </div>
            <div class="col-md-8 mt-4">
              <div class="container">
                  <div class="card">
                      <div class="card-header bg-success text-white">
                          Nilai Mata Pelajaran
                          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambah">
                               Tambah Data
                          </button> 
                      </div>
                      <div class="card-body">
                          <span><a href="#" class="btn btn-primary btn-sm mb-3">Cetak</a></span>
                          
                          <table class="table" id="dataTable" style="margin-top: 10px">
                              <thead>
                                  <tr>
                                      <th scope="col">Kode</th>
                                      <th scope="col">Mata Pelajaran</th>
                                      <th scope="col">Semester</th>
                                      <th scope="col">Nilai</th>
                                      <th scope="col">Aksi</th>
                                  </tr>
                              </thead>
                              
                          </table>
                      </div>
                  </div>
              </div>
            </div>                
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