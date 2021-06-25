@extends('include.head')

@section('content')

<div class="content-wrapper mt-3" >

<section class="content">
    <div class="container-fluid">
      @if(session('sukses'))
      <div class="alert alert-succsess" role="alert">
        {{session('sukses')}}
      </div>
      @endif
      @if(session('error'))
      <div class="alert alert-danger" role="alert">
        {{session('error')}}
      </div>
      @endif
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-dark card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-box" src="{{$siswa->getAvatar()}}" alt="Avatar">
              </div>

              <h3 class="profile-username text-center">{{$siswa->nama_siswa}}</h3>

              <p class="text-muted text-center">Siswa</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>NISN</b> <a class="float-right">{{ $siswa->nisn}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tempat Lahir</b> <a class="float-right">{{ $siswa->tmp_lahir }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal lahir</b> <a class="float-right">{{ $siswa->tgl_lahir}}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b> <a class="float-right">{{ $siswa->agama }}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis kelamin</b> <a class="float-right">{{ $siswa->jk }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">{{ $siswa->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kelas</b> <a class="float-right">{{ $siswa->kelas->nama_kelas}}</a>
                </li>
              </ul>
              
              <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          
          <!-- /.card -->
        </div>
        <div class="col-md-9">
        <div class="card" bis_skin_checked="1">
          <div class="card-header" bis_skin_checked="1">
            <div class="col-md-12">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#tambahData">
                Tambah Nilai
              </button>
            <h3 class="card-title">Mata Pelajaran</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body" bis_skin_checked="1">
            <table class="table table-bordered">
              <span><a href="#" target="_blank" class="btn btn-info float:left btn-sm mb-3 ">Cetak</a></span>
              <thead>
                <tr>
                  <th style="width: 10px">KODE</th>
                  <th>Nama</th>
                  <th>Semester</th>
                  <th style="width: 40px">Nilai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($siswa->mapel as $mapel)
                <tr>
                <td>{{$mapel->kode}}</td>
                  <td>{{$mapel->nama}}</td>
                  <td>{{$mapel->semester}}</td>
                  <td><span class="badge bg-success">{{$mapel->pivot->nilai}}</span></td>
                  <td><a href="#edit{{$mapel->id}}" data-toggle="modal" class="btn btn-warning">Edit</a>
                    <a href="#hapus{{$mapel->id}}" data-toggle="modal" class="btn btn-danger">Hapus</a></td>
                </tr>
                
              {{-- modaledit --}}
              <div class="modal fade" id="edit{{ $mapel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit nilai {{ $mapel->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/siswa/{{ $siswa->id }}/updatenilai" method="POST">
                            {{ csrf_field() }}
                            {{-- {{method_field('put')}} --}}
                            <div class="form-group" hidden>
                                <label for="mapel">Pilih Mata Pelajaran</label>
                                <select class="form-control" id="mapel" name="mapel" required>
                                    <option value="" selected disabled hidden>Pilih Mata Pelajaran</option>
                                    @foreach ($matapelajaran as $mp)
                                    <option class="text-capitalize text-dark" value="{{ $mp->id }}"  @if($mapel->id == $mp->id) selected @endif>{{ $mp->nama }}</option>    
                                    @endforeach
                                </select> 
                            </div>   
                            <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" min="0" max="100" name="nilai" class="form-control" value="{{ $mapel->pivot->nilai }}"/>
                                    {{-- <input type="number"  placeholder="Masukkan angka" min="0" max="100"> --}}
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                    </div>
                </div>
            </div>
              {{-- end Modal edit --}}

              {{-- modal Hapus --}}
              <div class="modal fade" id="delete{{ $mapel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $mapel->nama }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <p>Anda yakin ingin menghapus data ini {{ $mapel->nama }}</p>
                            <form action="/siswa/{{ $siswa->id }}/{{ $mapel->id }}/deletenilai" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <div class="form-group">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Konfirmasi Hapus</button>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            {{-- end modal hapus --}}
              @endforeach
          </tbody>
          <tfoot>
            <tr>
                <td colspan="7">
                    <center>
                        <div class="table-responsive" bis_skin_checked="1">
                            <table class="table-result" style="float:left;">
                                <tbody><tr>
                                    <td>Rata-Rata Nilai</td>
                                    <td>{{$siswa->test()}}</td>
                                </tr>
                            </tbody></table>
                        </div>
                    </center>
                </td>
            </tr>
        </tfoot>
        
              {{-- Modal edit Tambah --}}
              <div class="modal fade" id="tambahData">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Siswa</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body"> 
                    <form method="POST" action="/siswa/{{ $siswa->id }}/addnilai" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="mapel">Pilih Mata Pelajaran</label>
                        <select class="form-control" id="mapel" name="mapel" required>
                            <option value="" selected disabled hidden>Pilih Mata Pelajaran</option>
                            @foreach ($matapelajaran as $mp)
                            <option class="text-capitalize text-dark" value="{{ $mp->id }}">{{ $mp->nama }}</option>    
                            @endforeach
                        </select> 
                      <div class="form-group">
                       <label for="nilai">nilai</label>
                       <input type="number" min="0" max="100" name="nilai" class="form-control"/>
                        {{-- <input type="number"  placeholder="Masukkan angka" min="0" max="100"> --}}
                      </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
               </div>
             </div>
             {{-- end Modal tambah --}}
             <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
         </div>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix" bis_skin_checked="1">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">«</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
          </div>
        </div>
      </div>                
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  
</div>
@endsection
