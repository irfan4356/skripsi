@extends('includes.head')

@section('content')
    
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Basic Datatable</h5>
        <h1>Data Siswa</h1>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($data_siswa as $siswa)            
                    <tr>
                        <td>{{$siswa->nisn}}</td>
                        <td>{{$siswa->nama_siswa}}</td>
                        <td>{{$siswa->jk}}</td>
                        <td>{{$siswa->tmp_lahir}}</td>
                        <td>{{$siswa->tgl_lahir}}</td>
                        <td>{{$siswa->alamat}}</td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
            </div>
    </div>
    </div>
</div>
</div>
@endsection
