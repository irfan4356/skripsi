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
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection 