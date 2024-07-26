<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>A4</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4 landscape ></i>;
        }

        .tablekaryawan {
            margin-top: 10px;
        }

        .tablepresensi tr th {
            border: 1px solid #131212;
            padding: 8px;
            background-color: #dbdbdb;
            font-size: 10px;
        }

        .tablepresensi tr td {
            border: 1px solid #131212;
            padding: 5px;
            font-size: 10px;
        }
    </style>

</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 landscape">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">


        <table style="width:100%">
            <tr>
                <td>
                    <img src="{{ asset('assets/img/SIDAD.png') }}" alt="" class="src" width="100"
                        hight="100">
                </td>
                <td>

                    <center>
                        <span>LAPORAN ABSENSI APARATUR DESA <br>
                            DPMD. KABUPATEN-GARUT<br>
                            Periode : {{ $namabulan[$bulan] }} - {{ $tahun }}
                        </span>
                    </center>
                </td>


            </tr>

        </table>
        <hr>
        </hr>

        <table class="tablepresensi">
            <tr>
                <th rowspan="2">NIPD</th>
                <th rowspan="2">NAMA APARTUR DESA</th>

                <th colspan="31">
                    <CENTER>TANGGAL ABSENSI</CENTER>
                </th>
                <th rowspan="2">
                    HD
                </th>
                <th rowspan="2">
                    TT
                </th>
                </CENTER>
            </tr>
            <tr>
                <?php
                    for($i=1; $i<=31; $i++){
                    ?>
                <th>{{ $i }}</th>
                <?php
                    }
                    ?>


            </tr>
            @foreach ($rekap as $d)
                <tr>
                    <td>{{ $d->nik }}</td>
                    <td>{{ $d->nama_lenkap }}</td>


                    <?php
                    $totalhadir = 0;
                     $totalterlambat = 0;
                    for($i=1; $i<=31; $i++){
                    $tgl = "rgl_".$i;

                    if(empty($d->$tgl)){
                        $hadir = ['',''];
                         $totalhadir += 0;


                    }else{
                        $hadir = explode("-", $d->$tgl);
                        $totalhadir += 1;
                        if($hadir[0] > "08.00.00"){
                            $totalterlambat += 1;
                         }
                    }
                    ?>
                    <td>
                        <span style="color:{{ $hadir[0] > '08:00:00' ? 'red' : '' }}">{{ $hadir[0] }}</span>
                        <br>
                        <span style="color:{{ $hadir[1] < '16:00:00' ? 'red' : '' }}">{{ $hadir[1] }}</span>
                        <br>
                    </td>

                    <?php
                    }
                    ?>
                    <td>{{ $totalhadir }}</td>
                    <td>{{ $totalterlambat }}</td>

                </tr>
            @endforeach
        </table>

        </div><!-- end table responsive -->
        <div class="d-print-none mt-4">
            <div class="float-end">
                <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                <a href="#" class="btn btn-primary w-md">Send</a>
            </div>
        </div>


    </section>

</body>

</html>
