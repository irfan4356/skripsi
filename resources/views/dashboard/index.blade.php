@extends('include.head')
@section('title', 'Dashboard | SMPN 5 TEBO')
@section('content')
<div class="content-wrapper mt-3" >
    <div class="container-fluid">
        <h5 style="margin-bottom: 3rem">Selamat datang {{ Auth::user()->name }}</h5>
        <div class="row" bis_skin_checked="1">
            <div class="col-lg-3 col-6" bis_skin_checked="1">
            <!-- small box -->
            <div class="small-box bg-info" bis_skin_checked="1">
                <div class="inner" bis_skin_checked="1">
                <h3>{{ $siswa }}</h3>

                <p>Jumlah Siswa</p>
                </div>
                <div class="icon" bis_skin_checked="1">
                <i class="ion ion-bag"></i>
                </div>
                
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6" bis_skin_checked="1">
            <!-- small box -->
            <div class="small-box bg-success" bis_skin_checked="1">
                <div class="inner" bis_skin_checked="1">
                <h3>{{ $guru }}<sup style="font-size: 20px"></sup></h3>

                <p>Guru</p>
                </div>
                <div class="icon" bis_skin_checked="1">
                <i class="ion ion-stats-bars"></i>
                </div>
                
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6" bis_skin_checked="1">
            <!-- small box -->
            <div class="small-box bg-warning" bis_skin_checked="1">
                <div class="inner" bis_skin_checked="1">
                <h3>{{ $kelas }}</h3>

                <p>Kelas</p>
                </div>
                <div class="icon" bis_skin_checked="1">
                <i class="ion ion-person-add"></i>
                </div>
                
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6" bis_skin_checked="1">
            <!-- small box -->
            <div class="small-box bg-danger" bis_skin_checked="1">
                <div class="inner" bis_skin_checked="1">
                <h3>{{ $mapel }}</h3>

                <p>Mapel</p>
                </div>
                <div class="icon" bis_skin_checked="1">
                <i class="ion ion-pie-graph"></i>
                </div>
                
            </div>
            </div>
            <!-- ./col -->
        </div>  
    </div> 
    <div class="col-md-12 col">
        <div class="card shadow" style="margin-bottom: 100px">
            <h5 class="card-header bg-danger text-center text-white">PENGUMUMAN</h5>
            <div class="card-body">                            
                <h5 class="card-title">{{ $pengumuman->judul }}</h5>
                <p class="card-text text-justify">{!! $pengumuman->isi !!}</p>
            </div>
        </div>
    </div> 
</div>
@endsection