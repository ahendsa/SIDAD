@extends('admin.layouts.index')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
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
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h5 class="card-title">DAFTAR DESA<span </h5>
                                </div>
                            </div><!-- end col -->
                            <form action="/cabang" method = "GET">
                                <div class="col-md-12">
                                    <div
                                        class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">

                                        <div class="form-group">
                                            <input type="text" name="nama_cabang" id="nama_cabang" class="form-control"
                                                placeholder="nama desa" value="{{ Request('nama_cabang') }}">

                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-soft-info"> Cari</button>

                                        </div>
                                    </div><!-- end dropdown -->
                                </div>
                                <div <div>
                                    <a href="#" class="btn btn-light" data-bs-toggle="modal"
                                        data-bs-target="#btnTambahcabang"><i class="uil uil-plus me-1"></i> Tambah </a>
                                </div>

                            </form>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <!-- Modal -->
                <div class="modal fade" id="btnTambahcabang" tabindex="-1" aria-labelledby="addContactModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addContactModalLabel">Tambah Data Desa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- end modalheader -->

                            <div class="modal-body p-4">
                                <form action="/cabang/store" method="POST" id="frmcabang" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <div class="mb-3">
                                            <label for="addcontact-name-input" class="form-label">Kode</label>
                                            <input type="text" class="form-control" id="kode_cabang" name="kode_cabang"
                                                placeholder="Masukan kode">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addcontact-name-input" class="form-label">Nama Desa</label>
                                            <input type="text" class="form-control" id="nama_cabang" name="nama_cabang"
                                                placeholder="Nama Desa">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addcontact-name-input" class="form-label">Lokasi Kantor</label>
                                            <input type="text" class="form-control" id="lokasi_cabang"
                                                name="lokasi_cabang" placeholder="Lokasi Kantor">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addcontact-name-input" class="form-label">Radius</label>
                                            <input type="text" class="form-control" id="radius" name="radius"
                                                placeholder="Radius">
                                        </div>
                                        <div class="mb-3 mt-2">
                                            <form-group>
                                                <button class="btn btn-success w-100" w=>simpan</button>
                                            </form-group>
                                        </div>

                                    </div>
                                </form>

                            </div>

                            <!-- end modalbody -->


                            <!-- end modalfooter -->
                        </div><!-- end content -->.

                    </div>
                </div>
                <!-- end modal -->

                <div class="table-responsive">

                    <table class="table align-middle table-nowrap table-check">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>

                                <th scope="col">Kode</th>
                                <th scope="col">Nama Desa</th>
                                <th scope="col">Lokasi Kantor </th>
                                <th scope="col">Radius</th>

                                <th style="width: 80px; min-width: 80px;">Action</th>
                            </tr><!-- end tr -->
                        </thead><!-- end thead -->
                        <tbody>
                            @foreach ($cabang as $d)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                            <label class="form-check-label" for="contacusercheck1"></label>
                                        </div>
                                    </th>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="badge badge-soft-primary">{{ $d->kode_cabang }}</a>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="badge badge-soft-primary">{{ $d->nama_cabang }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="badge badge-soft-primary">{{ $d->lokasi_cabang }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="badge badge-soft-primary">{{ $d->radius }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="edit" id="edit"
                                                kode_cabang={{ "$d->kode_cabang" }}><button
                                                    class="class btn btn-primary btn-sm"> <i
                                                        class="fa fa-edit"></button></i></a>

                                            <form action="/karyawan/{{ $d->kode_cabang }}/delete" style="margin-left: 5px"
                                                method="POST">
                                                @csrf


                                                <button class=" btn-danger btn-sm sa-warning"><i
                                                        class="fa fa-trash"></i></button>

                                            </form>
                                        </div>


                                    </td>
                                </tr><!-- end tr -->

                                </td>
                                </tr><!-- end tr -->
                            @endforeach
                        </tbody><!-- end tbody -->

                    </table><!-- end table -->

                    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="addContactModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addContactModalLabel">Edit Data Desa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <!-- end modalheader -->
                                <div class="modal-body p-4" id="loadeditform">

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end table responsive -->

                <div class="row g-0 text-center text-sm-start">
                    <div class="col-sm-6">
                        <div>
                            <p class="mb-sm-0">Showing 1 to 10 of 57 entries</p>
                        </div>
                    </div>

                </div><!-- end row -->
            </div>

            <!-- Modal Edit -->

        </div>
    @endsection

    @push('myscript')
        <script>
            $(function() {

                $(".edit").click(function() {
                    var kode_cabang = $(this).attr('kode_cabang');

                    $.ajax({
                        type: 'POST',
                        url: '/cabang/edit',
                        cache: false,
                        data: {
                            _token: "{{ csrf_token() }}",
                            kode_cabang: kode_cabang
                        },
                        success: function(respond) {
                            $("#loadeditform").html(respond);
                        }
                    });

                    $("#editData").modal("show");
                });

                $("#frmKaryawan").submit(function() {

                    var kode_cabang = $("#kode_cabang").val();
                    var nama_cabang = $("#nama_cabang").val();
                    var lokasi_cabang = $("#lokasi_cabang").val();
                    var radius = $("#radius").val();


                });
            });
        </script>
    @endpush
