@extends('include.head')

@section('content')
<div class="content-wrapper mt-3" >


  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Siswa</h3>
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
                          <h4 class="modal-title">Tambah Data Siswa</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form method="POST" action="{{route('siswa.tambah')}}" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input name="nisn" type="number" class="form-control"/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">NISN tidak boleh kosong!</div>
                           </div>
                           <div class="form-group">
                             <label for="nama_siswa">Nama</label>
                             <input name="nama_siswa" type="text" class="form-control"/>
                             <div class="valid-feedback">Valid.</div>
                             <div class="invalid-feedback">Nama tidak boleh kosong!</div>
                            </div>
                            <div class="form-group">
                              <label for="jk">Jenis Kelamin</label>
                              <select name="jk" class="form-control">
                               <option>Jenis Kelamin</option>
                               <option value="L">laki-laki</option>
                               <option value="P">perempuan</option>
                             </select>
                             <div class="valid-feedback">Valid.</div>
                             <div class="invalid-feedback">Jenis kelamin tidak boleh kosong!</div>
                            </div>
                            <div class="form-group">
                              <label for="agama">Agama</label>
                              <select name="agama" class="form-control">
                               <option>Agama</option>
                               <option value="islam">Islam</option>
                               <option value="hindu">Hindu</option>
                               <option value="protestan">Protestan</option>
                               <option value="katolik">Katolik</option>
                               <option value="budha">Budha</option>
                               <option value="konghucu">Konghucu</option>
                             </select>
                             <div class="valid-feedback">Valid.</div>
                             <div class="invalid-feedback">Agama tidak boleh kosong!</div>
                            </div>
                            <div class="form-group">
                              <label for="tmp_lahir">Tempat Lahir</label>
                              <input name="tmp_lahir"type="text" class="form-control"/>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Tempat lahir tidak boleh kosong!</div>
                             </div>
                             <div class="form-group">
                              <label for="tgl_lahir">Tanggal Lahir</label>
                              <input name="tgl_lahir"type="date" class="form-control"/>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Tanggal lahir tidak boleh kosong!</div>
                             </div>
                             <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input name="alamat"type="textarea" class="form-control"/>
                             </div>
                             <div class="form-group">
                              <label for="agama">Pilih Kelas</label>
                              <select class="form-control" name="kelas_id" required>
                                  <option value="" selected disabled hidden>Pilih Kelas</option>
                                  @foreach ($kelass as $kelas)
                                  <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>    
                                  @endforeach
                              </select> 
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Kelas tidak boleh kosong!</div>
                          </div>
                             <div class="form-group">
                              <label for="email">Email</label>
                              <input name="email"type="email" class="form-control"/>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">e-mail tidak boleh kosong! Format e-mail salah!</div>
                             </div>
                             <div class="form-group">
                              <label for="alamat">Avatar</label>
                              <input type="file" name="avatar" class="form-control">
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
          
              
              <!-- /.card-header -->
              <div class="card-body" bis_skin_checked="1">
                <table class="table table-bordered">
                      <thead>
                          <tr class="bg-primary text-dark">
                              <th>No</th>
                              <th>Nama</th>
                              <th>NISN</th>
                              <th>Jenis Kelamin</th>
                              <th>Agama</th>
                              <th>Tempat Lahir</th>
                              <th>Tanggal Lahir</th>
                              <th>Alamat</th>
                              <th>Kelas</th>
                              <th>Email</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($data_siswaa as $data)    
                          <tr>
                              <td style="width: 20px">{{ $loop->iteration }}</td>
                              <td class="text-capitalize"><a href="/siswa/{{$data->id}}/profile">{{$data->nama_siswa}}</a></td>
                              <td class="text-capitalize">{{$data->nisn}}</a></td>
                              <td class="text-capitalize">{{$data->jk}}</td>
                              <td class="text-capitalize">{{$data->agama}}</td>
                              <td class="text-capitalize">{{$data->tmp_lahir}}</td>
                              <td class="text-capitalize">{{$data->tgl_lahir}}</td>
                              <td class="text-capitalize">{{$data->alamat}}</td>
                              <td class="text-capitalize">{{ $data->kelas->nama_kelas}}</td>
                              <td class="text-capitalize">{{$data->email}}</td>
                              <td><a href="#edit{{$data->id}}" data-toggle="modal" class="btn btn-warning">Edit</a>
                                  <a href="#hapus{{$data->id}}" data-toggle="modal" class="btn btn-danger">Hapus</a></td>
                              
                          </tr>

                          {{-- modal edit --}}
                        <div class="modal fade" id="edit{{$data->id}}">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Tambah Data Siswa</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="{{route('siswa.update',$data->id)}}" enctype="multipart/form-data">
                                   @csrf
                                   {{method_field('put')}}
                                   <div class="form-group">
                                    <label for="nisn">NISN</label>
                                   <input name="nisn" type="number" class="form-control" value="{{$data->nisn}}" />
                                   </div>
                                   <div class="form-group">
                                     <label for="nama_siswa">Nama</label>
                                     <input name="nama_siswa" type="text" class="form-control"value="{{$data->nama_siswa}}"/>
                                    </div>
                                    <div class="form-group">
                                      <label for="jk">Jenis Kelamin</label>
                                      <select name="jk" class="form-control">
                                       <option>Jenis Kelamin</option>
                                       <option value="L" @if($data->jk == 'L') selected @endif>laki-laki</option>
                                       <option value="P" @if($data->jk == 'P') selected @endif>perempuan</option>
                                     </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="agama">Agama</label>
                                      <select name="agama" class="form-control">
                                       <option>Agama</option>
                                       <option value="islam"@if($data->agama == 'islam') selected @endif>Islam</option>
                                       <option value="hindu"@if($data->agama == 'hindu') selected @endif>Hindu</option>
                                       <option value="protestan"@if($data->agama == 'protestan') selected @endif>Protestan</option>
                                       <option value="katolik"@if($data->agama == 'katolik') selected @endif>Katolik</option>
                                       <option value="budha"@if($data->agama == 'budha') selected @endif>Budha</option>
                                       <option value="konghucu"@if($data->agama == 'konghucu') selected @endif>Konghucu</option>
                                     </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="tmp_lahir">Tempat Lahir</label>
                                      <input name="tmp_lahir"type="text" class="form-control"value="{{$data->tmp_lahir}}"/>
                                     </div>
                                     <div class="form-group">
                                      <label for="tgl_lahir">Tanggal Lahir</label>
                                      <input name="tgl_lahir"type="date" class="form-control"value="{{$data->tgl_lahir}}"/>
                                     </div>
                                     <div class="form-group">
                                      <label for="alamat">Alamat</label>
                                      <input name="alamat"type="textarea" class="form-control"value="{{$data->alamat}}"/>
                                     </div>
                                     <div class="form-group">
                                      <label for="agama">Pilih Kelas</label>
                                      <select class="form-control" name="kelas_id" required>
                                          <option value="" selected disabled hidden>Pilih Kelas</option>
                                          @foreach ($kelass as $kelas)
                                          <option value="{{ $kelas->id }}" @if($kelas->nama_kelas == $kelas->nama_kelas) selected @endif>{{ $kelas->nama_kelas }}</option>    
                                          @endforeach
                                      </select> 
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Kelas tidak boleh kosong!</div>
                                    </div>
                                     <div class="form-group">
                                      <label for="email">Email</label>
                                      <input name="email"type="email" class="form-control"value="{{$data->email}}"/>
                                     </div>
                                     <div class="form-group">
                                      <label for="alamat">Avatar</label>
                                      <input type="file" name="avatar" class="form-control">
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

                                <form action="{{ route('siswa.delete',$data->id) }}" method="POST">
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

                          @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      
      </div>
      
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- /.container-fluid -->
  </section>
</div>
@endsection
