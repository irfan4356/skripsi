<html>
<head>
	<title>SMP N 5 TEBO</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        .container{
            margin: 10px;
        }
        #headrapor{
            margin-left: 10px;
        }
        #headrapor p{
            margin-bottom: 1px;
            font-size: 10pt
        }
        .header img{
            margin: 10px;
        }
        hr{
            
            border: none;
            height: 2px;
            /* Set the hr color */
            color: #333; /* old IE */
            background-color: #333; /* Modern Browsers */
        }
	</style>
            <table width="100%">
                <tr>
                <td width="50px" align="left"><img src="{{ asset('images/logo_diknas.png') }}" width="100%"></td>
                <td width="100px" align="center">
                    <h5>Dinas Pendidikan Kabupaten Tebo</h5>
                    <h6>SMPN 5 Tebo</h6>
                    <small>Ps.Sungai bengkal</small>
                </td>
                <td width="50px" align="right"><img src="{{ asset('assets/img/logo.png') }}" width="100%"></td>
                </tr>
            </table>
            <hr>
            <h5 class="text-center">Laporan Nilai Siswa</h5>

    <div class="container">
        <div class="row">
            <div class="col-6" id="headrapor">
                <p>Nama  : <span class="text-capitalize">{{ $siswa->nama_siswa }}</span></p>
                <p>Kelas : {{ $siswa->kelas->nama_kelas }}</p>
                <p>NISN  : {{ $siswa->nisn }}</p>
                <p>Jenis kelamin  : {{ $siswa->jk }}</p>
            </div>
            {{-- <div class="col">Kelas      : <span>{{ $siswa->kelas->nama }}</span></div> --}}
        </div>
    </div>
	<table class='table table-bordered'>
		<thead>
            <tr>
                <th scope="col">Kode</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Semester</th>
                <th scope="col">Nilai</th>
            </tr>
        </thead>
        <tbody>
           <?php
            $total = 0;
            $hitung = 0;
            $result = 0;
            ?>
            @foreach ($siswa->mapel as $obj)    
            <tr>
                <td>{{ $obj->kode }}</td>
                <td>{{ $obj->nama }}</td>
                <td>{{ $obj->semester  }}</td>
                <td>{{ $obj->pivot->nilai }}</td>
                <?php
                $total = $total + $obj->pivot->nilai;
                $hitung++;
                $result = $total/$hitung;
                ?>
            </tr>
			@endforeach
            @if ($result>0)
            {
                <tr>
                    <td colspan="3" class="text-center ">Rata-Rata</td>
                    <td colspan="2">{{ $result }}</td>
                </tr>
            }   
            @else
             {
                 <tr>
                    <td colspan="5" class="text-center"><h5>Data Masih Kosong</h5></td>
                 </tr>
             }   
            @endif
		</tbody>
	</table>
    <br><br><br>

    <?php
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
        
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
    ?>
    <p align="right" id="tanggal" class="mb-2">Tebo Ilir, {{tgl_indo(date('Y-m-d')) }}</p>
    <p align="right" style="margin-right: 85px">{{ $siswa->kelas->walikelas }}  </p>
</body>

</html>