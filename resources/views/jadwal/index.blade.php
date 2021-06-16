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
                <tr>
                    <th> No</th>
                    <th >Nama Kelas</th>
                    <th >Wali Kelas</th>
                    <th >Aksi</th>
                </tr>
                <tbody>
                    @foreach ($kelas as $kelas) 
                    <tr>
                        <td style="width: 20px">{{ $loop->iteration }}</td>
                        <td class="text-capitalize"><a href="{{ route('jadwal.show',$kelas->id) }}">{{ $kelas->namakelas }}</a></td>
                        <td class="text-capitalize">{{ $kelas->walikelas }}</td>
              
                    </tr>
                    @endforeach
                </tbody>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
@endsection