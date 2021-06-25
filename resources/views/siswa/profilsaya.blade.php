@extends('include.head')

@section('content')

<div class="content-wrapper mt-3" >

<section class="content">
  <div class="card">
    <div class="card-header bg-primary text-dark">
        <h5 >Data Diri {{auth()->user()->siswa->nama_siswa}}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- start biodata diri -->
                <div class="row">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-box" src="{{auth()->user()->siswa->getAvatar()}}" alt="Avatar">
              </div>
              <tr>
                <td colspan="2"><h3 class="profile-username text-center">{{auth()->user()->siswa->nama_siswa}}</h3></td>
              </tr>
              <p class="text-muted text-center">Siswa</p>
                <div class="col-md-10">
                  <table class="table table-sm table-stripped">
                      <tbody>
                        <tr>
                          <td class="font-weight-bold">NISN</td>
                          <td>: {{ auth()->user()->siswa->nisn }}</td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">Tempat Lahir</td>
                          <td>: {{ auth()->user()->siswa->tmp_lahir }}</td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">Tanggal lahir</td>
                          <td>: {{ auth()->user()->siswa->tgl_lahir }}</td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">Agama</td>
                          <td>: {{ auth()->user()->siswa->agama }}</td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">Jenis kelamin</td>
                          <td>: {{ auth()->user()->siswa->jk }}</td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">Email</td>
                          <td>: {{ auth()->user()->siswa->email }}</td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold">Kelas</td>
                          <td>: {{ auth()->user()->siswa->kelas->nama_kelas }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div> 
            </div>
            <!-- end biodata diri -->
      </div>
    </div>
  </div>
</section>
</div>
@endsection