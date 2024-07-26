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
            size: A4 margin: 27mm 16mm 27mm 16mm;
        }

        .tablekaryawan {
            margin-top: 10px;
        }
    </style>

</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4">

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
        <table>
            <tr>
                <td rowspan="5"> @php
                    $path = Storage::url('uploads/karyawan/' . $karyawan->foto);
                @endphp
                    <img src="{{ url($path) }}" alt="" width="100px" height="100px">
                </td>

            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $karyawan->nik }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $karyawan->nama_lenkap }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>{{ $karyawan->jabatan }}</td>
            </tr>
            <tr>
                <td>Desa</td>
                <td>:</td>
                <td>{{ $karyawan->nama_dept }}</td>
            </tr>
        </table>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <hr class="my-4">
                        <!-- end row -->
                        <div class="py-2">
                            <h5 class="font-size-15">Absensi Summary</h5>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>

                                            <th>Tanggal</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th class="text-end" style="width: 120px;">Keterangan</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @foreach ($presensi as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->tgl_presensi }}</td>
                                                <td>{{ $d->jam_in }}</td>
                                                <td>{{ $d->jam_out != null ? $d->jam_out : 'Tidak Absen' }}</td>
                                                <td>
                                                    @if ($d->jam_out > '07:00')
                                                        Terlambat
                                                    @else
                                                        Tepat Waktu
                                                    @endif
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        <!-- end tr -->

                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i
                                            class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary w-md">Send</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </section>

</body>

</html>
