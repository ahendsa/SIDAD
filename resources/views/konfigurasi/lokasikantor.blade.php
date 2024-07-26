@extends('admin.layouts.index')

@section('content')
    <div class="page-content">
        <div class="page-body">
            <div class="container-xl">
                <div class="col-12">
                    <div class="card">
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ session::get('success') }}
                            </div>
                        @endif

                        @if (Session::get('warning'))
                            <div class="alert alert-warning">
                                {{ session::get('warning') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="/konfigurasi/updatelokasi" method="POST"">
                                @csrf
                                <div class="col-md-12">
                                    <div <div class="form-group">


                                        <input type="text" name="lokasi_kantor" id="lokasi_kantor" class="form-control"
                                            placeholder="Lokasi Kantor" value="{{ $lok_kantor->lokasi_kantor }}">


                                    </div>
                                    <div class=mt-2>
                                        <div class="form-group">
                                            <input type="text" name="radius" id="radius" class="form-control"
                                                placeholder="Radius " value="{{ $lok_kantor->radius }}">
                                        </div>
                                        <div class="form-floating">
                                            <button type="submit" name="cetak" class="btn btn-primary w-100 mt-2"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                    <path d="M7 11l5 5l5 -5" />
                                                    <path d="M12 4l0 12" />
                                                </svg>
                                                Simpan </button>
                                        </div>
                                    </div>

                                </div><!-- end dropdown -->
                        </div>


                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>

    </div>
@endsection
