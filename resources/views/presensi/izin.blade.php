@extends('layouts.presensi')
@section('header')
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="/" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"</ion-icon>
            </a>
        </div>
        <div class="pageTitle">IZIN / SAKIT </div>
        <div class="right"></div>
    </div>
@endsection

@section('content')
    <div class="row" style="margin-top:70px">
        <div class="col">

            <ul class="listview image-listview">
                @foreach ($dataizin as $d)
                    <li>
                        <div class="item">

                            <div class="in">
                                <div>{{ date('d-m-Y', strtotime($d->tgl_izin)) }}
                                    <br>

                                    <span class="text-muted">{{ $d->keterangan }}</span>
                                </div>

                                @if ($d->status == 1)
                                    <span class="badge bg-warning">Izin</span>
                                @elseif ($d->status == 2)
                                    <span class="badge bg-danger">Sakit</span>
                                @endif
                            </div>


                        </div>
                    </li>
                @endforeach

            </ul>


        </div>
    </div>


    <div class="col">
        <div class="row style="margin-top:70px">
            <div class="class col">
                @php
                    $messagesucces = Session::get('success');
                    $messageerror = Session::get('error');
                @endphp

                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ $messagesucces }}
                    </div>
                @endif

                @if (Session::get('error'))
                    <div class="alert alert-danger">
                        {{ $messageerror }}
                    </div>
                @endif
            </div>
        </div>
    </div>



    <div class="fab-button bottom-right" style="margin-bottom:75px">

        <a href="/presensi/buatizin" class="fab">
            <ion-icon name="add-outline"></ion-icon>
        </a>
    </div>
@endsection
