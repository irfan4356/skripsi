@extends('include.head')

@section('content')
<div class="content-wrapper mt-3" >

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Kelas</h3>
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
                                <h4 class="modal-title">Tambah Data Kelas</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <form method="POST" action="{{route('kelas.tambah')}}">
                                 @csrf
                                 <div class="form-group">
                                  <label for="nama_kelas">Kelas</label>
                                  <input name="nama_kelas" type="text" class="form-control"/>
                                  <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Kelas tidak boleh kosong!</div>
                                 </div>
                                 <div class="form-group">
                                  <label for="walikelas">Wali Kelas</label>
                                  <input name="walikelas" type="text" class="form-control"/>
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
                  <div class="card-body" bis_skin_checked="1">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary text-dark">
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kelass as $data)    
                            <tr>
                                <td style="width: 20px">{{ $loop->iteration }}</td>
                                <td class="text-capitalize"><a href="{{ route('kelas.show',$data->id) }}">{{ $data->nama_kelas }}</a></td>
                                <td class="text-capitalize">{{$data->walikelas}}</td>
                                <td><a href="#edit{{$data->id}}" data-toggle="modal" class="btn btn-warning">Edit</a>
                                    <a href="#hapus{{$data->id}}" data-toggle="modal" class="btn btn-danger">Hapus</a></td>
                            </tr>
                             {{-- modal edit --}}
                    <div class="modal fade" id="edit{{$data->id}}">">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Guru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form method="POST" action="{{route('kelas.update',$data->id)}}">
                             @csrf
                             {{method_field('put')}}
                                 <div class="form-group">
                                  <label for="nama_kelas">Kelas</label>
                                  <input name="nama_kelas" type="text" class="form-control"value="{{$data->nama_kelas}}"/>
                                 </div>
                                 <div class="form-group">
                                   <label for="walikelas">Wali Kelas</label>
                                   <input name="walikelas" type="text" class="form-control"value="{{$data->walikelas}}"/>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                     <div class="modal fade" id="hapus{{$data->id}}">
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

                                <form action="{{ route('kelas.delete',$data->id) }}" method="POST">
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