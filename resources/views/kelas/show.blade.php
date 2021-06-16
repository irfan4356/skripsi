@extends('include.head')

@section('content')
<div class="content-wrapper mt-3" >
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Siswa Kelas {{ $kelas2->nama_kelas }}</h3>
            </div>
            <div class="col-md-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas2->siswa as $siswa)    
                        <tr>
                            <td style="width: 10%">{{ $loop->iteration }}</td>
                            <td class="text-capitalize" style="width: 40%">{{ $siswa->nama_siswa }}</td>
                            <td class="text-capitalize">{{ $siswa->nisn }}</td>
                            <td class="text-capitalize">{{ $siswa->jk }}</td>
                        </tr>
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