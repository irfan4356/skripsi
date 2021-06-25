@extends('include.head')

@section('content')

<div class="content-wrapper mt-3" >

<section class="content">
    <div class="container-fluid-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card" bis_skin_checked="1">
                  <div class="card-header" bis_skin_checked="1">
                    <div class="col-md-12">
                      <!-- Button trigger modal -->
                      <h5 class="card-header bg-primary text-dark">Nilai</h5>
                    </div>
                  <!-- /.card-header -->
                  <div class="card-body" bis_skin_checked="1">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">KODE</th>
                          <th>Nama</th>
                          <th>Semester</th>
                          <th style="width: 40px">Nilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach (auth()->user()->siswa->mapel as $mapel)
                        <tr>
                        <td>{{$mapel->kode}}</td>
                          <td>{{$mapel->nama}}</td>
                          <td>{{$mapel->semester}}</td>
                          <td><span class="badge bg-info">{{$mapel->pivot->nilai}}</span></td>
                        </tr>
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
                                            <td>{{auth()->user()->siswa->test()}}</td>
                                        </tr>
                                    </tbody></table>
                                </div>
                            </center>
                        </td>
                    </tr>
                </tfoot>
              </table>
          </div>
      </div>                
    </div>
</section>
  
</div>
@endsection
