@extends('include.head')

@section('content')
<div class="content-wrapper mt-3" >

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Mata Pelajaran</h3>
                </div>
                <div class="col-md-12">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#tambahData">
                          Tambah Data
                        </button>
    
                        <div class="modal fade" id="tambahData">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Mata Pelajaran</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <form method="POST" action="{{route('mapel.tambah')}}">
                                 @csrf
                                 <div class="form-group">
                                    <label for="kode">Kode Mata Pelajaran</label>
                                    <input name="kode" type="text" class="form-control"/>
                                   </div>
                                   <div class="form-group">
                                     <label for="nama">Nama Mata Pelajaran</label>
                                     <input name="nama" type="text" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <input name="semester" type="text" class="form-control"/>
                                       </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                               </form>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                  </div>
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mata Pelajaran</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                        </thead>
                        <tbody>
                    @foreach ($mapell as $mapel)
                    <tr>
                        <td style="width: 20px">{{ $loop->iteration }}</td>
                        <td>{{$mapel->kode}}</td>
                        <td>{{$mapel->nama}}</td>
                        <td>{{$mapel->semester}}</td>
                        <td><a href="#edit{{$mapel->id}}" data-toggle="modal" class="btn btn-warning">Edit</a>
                            <a href="#hapus{{$mapel->id}}" data-toggle="modal" class="btn btn-danger">Hapus</a></td>
                 </tr>
                 {{-- modal edit --}}
                 <div class="modal fade" id="edit{{$mapel->id}}">">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Data Guru</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="{{route('mapel.update',$mapel->id)}}">
                           @csrf
                           {{method_field('put')}}
                           <div class="form-group">
                            <label for="kode">Kode Mata Pelajaran</label>
                            <input name="kode" type="text" class="form-control"value="{{$mapel->kode}}"/>
                           </div>
                           <div class="form-group">
                             <label for="nama">Nama Mata Pelajaran</label>
                             <input name="nama" type="text" class="form-control"value="{{$mapel->nama}}"/>
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input name="semester" type="text" class="form-control"value="{{$mapel->semester}}"/>
                               </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            </div>
                 {{-- Hapus Data --}}
                 <div class="modal fade" id="hapus{{$mapel->id}}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Apakah Anda Yakin?</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">

                            <form action="{{ route('mapel.delete',$mapel->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <div class="form-group">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Konfirmasi Hapus</button>
                            </form>
                           </div>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
            </div>
          </div>
        </div>
    </section>
</div>
@endsection