@extends('include.head')

@section('content')
<div class="content-wrapper mt-3" >

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Guru</h3>
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
                            <h4 class="modal-title">Tambah Data Guru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form method="POST" action="{{route('guru.tambah')}}">
                             @csrf
                             <div class="form-group">
                              <label for="nip">NIP</label>
                              <input name="nip" type="number" class="form-control"/>
                             </div>
                             <div class="form-group">
                               <label for="nama_guru">Nama</label>
                               <input name="nama_guru" type="text" class="form-control"/>
                              </div>
                              <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" class="form-control">
                                 <option>Jenis Kelamin</option>
                                 <option value="L">laki-laki</option>
                                 <option value="P">perempuan</option>
                               </select>
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
                              </div>
                              <div class="form-group">
                                <label for="telp">Telpon</label>
                                <input name="telp" type="number" class="form-control"/>
                               </div>
                              <div class="form-group">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input name="tmp_lahir"type="text" class="form-control"/>
                               </div>
                               <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input name="tgl_lahir"type="date" class="form-control"/>
                               </div>
                               
                               <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email"type="text" class="form-control"/>
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
                            <th> No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Telpon</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($data_guruu as $data)    
                    <tr>
                        <td style="width: 20px">{{ $loop->iteration }}</td>
                        <td class="text-capitalize"><a href="/guru/{{$data->id}}/profile">{{$data->nama_guru}}</td>
                        <td class="text-capitalize">{{$data->nip}}</td>
                        <td class="text-capitalize">{{$data->jk}}</td>
                        <td class="text-capitalize">{{$data->agama}}</td>
                        <td class="text-capitalize">{{$data->telp}}</td>
                        <td class="text-capitalize">{{$data->tmp_lahir}}</td>
                        <td class="text-capitalize">{{$data->tgl_lahir}}</td>
                        <td class="text-capitalize">{{$data->email}}</td>
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
                            <form method="POST" action="{{route('guru.update',$data->id)}}">
                               @csrf
                               {{method_field('put')}}
                               <div class="form-group">
                                <label for="nip">NIP</label>
                                <input name="nip" type="number" class="form-control" value="{{$data->nip}}"/>
                               </div>
                               <div class="form-group">
                                 <label for="nama_guru">Nama</label>
                                 <input name="nama_guru" type="text" class="form-control"value="{{$data->nama_guru}}"/>
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
                                  <label for="telp">Telpon</label>
                                  <input name="telp" type="number" class="form-control"value="{{$data->telp}}"/>
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
                                  <label for="email">Email</label>
                                  <input name="email"type="text" class="form-control"value="{{$data->email}}"/>
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

                                <form action="{{ route('guru.delete',$data->id) }}" method="POST">
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
                </table>
            </div>
          </div>
        </div>
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