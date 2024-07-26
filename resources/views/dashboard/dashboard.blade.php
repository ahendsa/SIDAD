@extends('layouts.presensi')
@section('content')
    <div class="section" id="user-section">
        <div id="user-detail">
            <div class="avatar">
                @if (!empty(Auth::guard('karyawan')->user()->foto))
                    @php
                        $path = Storage::url('uploads/karyawan/' . Auth::guard('karyawan')->user()->foto);
                    @endphp
                    <img src="{{ url($path) }}" alt="avatar" class="imaged w64 rounded ">
                @else
                    <img src="{{ asset('admin/img/sample/avatar/avatar1.jpg') }}" alt="avatar" class="imaged w64 rounded">
                @endif

            </div>
            <div id="user-info">
                <h2 id="user-name">{{ Auth::guard('karyawan')->user()->nama_lenkap }}</h2>
                <span id="user-role">{{ Auth::guard('karyawan')->user()->jabatan }}</span>
            </div>
        </div>
    </div>

    <div class="section" id="menu-section">
        <div class="card">
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-6">
                        <div class="card gradasigreen">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence">
                                        @if ($absensihariini != null)
                                            @php
                                                $path = Storage::url('uploads/absensi/' . $absensihariini->foto_in);
                                            @endphp
                                            <img src="{{ url($path) }}" class="imaged w64" atl="">
                                        @else
                                            <ion-icon name="camera"></ion-icon>
                                        @endif

                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="presencetitle">Masuk</h4>
                                        <span>
                                            {{ $absensihariini != null ? $absensihariini->jam_in : 'Belum Absen' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card gradasired">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence">
                                        @if ($absensihariini != null && $absensihariini->jam_out != null)
                                            @php
                                                $path = Storage::url('uploads/absensi/' . $absensihariini->foto_out);
                                            @endphp
                                            <img src="{{ url($path) }}" class="imaged w64" atl="">
                                        @else
                                            <ion-icon name="camera"></ion-icon>
                                        @endif
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="presencetitle">Pulang</h4>
                                        <span>{{ $absensihariini != null && $absensihariini->jam_out != null ? $absensihariini->jam_out : 'Belum Absen' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-4" id="presence-section">

        <div class="todaypresence">

            <div>
                <H3 style="font-family: " class="bade badge-primary">
                    <marquee>Rekap Absensi Bulan {{ $namabulan[$bulanini] }} Tahun
                        {{ $tahunini }}
                </H3>
                </marquee>
            </div>
        </div>


        <div class=" row" mt-6>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-height:0.8rem">
                        <span class="badge bg-danger"
                            style="position: absolute; top:3px; right:10px; font-size:0.6rem; z-index:999 ">{{ $rekappresensi->jmlhadir }}</span>
                        <ion-icon name="accessibility-outline" style="font-size: 1.6rem;" class="text-primary"></ion-icon>
                        <span style="font-size: 0.6rem; font-weigt: 500rem;" class="text-primary">HADIR</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-height:0.8rem">
                        <span class="badge bg-danger"
                            style="position: absolute; top:3px; right:10px; font-size:0.6rem; z-index:999 ">{{ $rekapizin->jmlsakit }}</span>
                        <ion-icon name="medkit-outline" style="font-size: 1.6rem;" class="text-warning"></ion-icon>
                        <span style="font-size: 0.6rem; font-weigt: 500rem;" class="text-warning">SAKIT</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-height:0.8rem">
                        <span class="badge bg-danger"
                            style="position: absolute; top:3px; right:10px; font-size:0.6rem; z-index:999 ">{{ $rekapizin->jmlizin }}</span>
                        <ion-icon name="newspaper-outline" style="font-size: 1.6rem;" class="text-success"></ion-icon>
                        <span style="font-size: 0.6rem; font-weigt: 500rem;" class="text-success">IZIN</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center" style="padding: 12px 12px !important; line-height:0.8rem">
                        <span class="badge bg-danger"
                            style="position: absolute; top:3px; right:10px; font-size:0.6rem; z-index:999 ">{{ $rekappresensi->jmlterlambat }}</span>
                        <ion-icon name="alarm-outline" style="font-size: 1.6rem;" class="text-danger"></ion-icon>
                        <span style="font-size: 0.6rem; font-weigt: 500rem;" class="text-danger">TELAT</span>
                    </div>
                </div>
            </div>
        </div>




        <div class="presencetab mt-2">
            <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="true">
                            Bulan Ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">
                            Leaderboard
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-2" style="margin-bottom:100px;">
                <div class="tab-pane fade active show" id="home" role="tabpanel">
                    <ul class="listview image-listview">
                        @foreach ($historibulanini as $d)
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-primary">

                                        <ion-icon name="checkmark-outline" role="img" class="md hydrated"
                                            aria-label="image outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>{{ date('d-m-Y', strtotime($d->tgl_presensi)) }}</div>
                                        <span class="badge badge-primary">{{ $d->jam_in }}</span>
                                        <span
                                            class="badge badge-danger">{{ $absensihariini != null && $d->jam_out != null ? $d->jam_out : 'Belum Absen Pulang' }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel">
                    <ul class="listview image-listview">
                        @foreach ($leaderboard as $d)
                            <li>
                                <div class="item">

                                    <div class="in">
                                        <div>{{ $d->nama_lenkap }}
                                            <br>
                                            <small>{{ $d->jabatan }}</small>
                                        </div>
                                        <span
                                            class="badge bg-success {{ $d->jam_in < '07:00' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $d->jam_in }}
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
