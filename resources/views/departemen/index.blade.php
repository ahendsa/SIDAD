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
                            <div class="col-md-12>
                                <div class="mb-3">
                                <h5 class="card-title">DAFTAR KECAMATAN</h5>
                            </div><!-- end col -->
                            <div class="row">
                                <div class="col-md-6>
                                <form action="/departemen"
                                    method = "GET">

                                    <div
                                        class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="nama_dept" id="nama_dept" class="form-control"
                                                placeholder="nama desa" value="{{ Request('nama_dept') }}">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-soft-info"> Cari</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <div>
                                <a href="#" class="btn btn-light" data-bs-toggle="modal"
                                    data-bs-target="#btnTambahdepartemen">
                                    </i> Tambah
                                </a>
                            </div>
                        </div>

                    </div>

                </div><!-- end col -->
            </div><!-- end row -->

            <!-- Modal -->
            <div class="modal fade" id="btnTambahdepartemen" tabindex="-1" aria-labelledby="addContactModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addContactModalLabel">Tambah Data Kecamatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- end modalheader -->

                        <div class="modal-body p-4">
                            <form action="/departemen/store" method="POST" id="frmdepartemen"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="mb-3">
                                        <label for="addcontact-name-input" class="form-label">Kode</label>
                                        <input type="text" class="form-control" id="kode_dept" name="kode_dept"
                                            placeholder="Masukan kode">
                                    </div>
                                    <div class="mb-3">
                                        <label for="addcontact-name-input" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama_dept" name="nama_dept"
                                            placeholder="Nama Jabatan">
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
                            <th scope="col">Nama</th>

                            <th style="width: 80px; min-width: 80px;">Action</th>
                        </tr><!-- end tr -->
                    </thead><!-- end thead -->
                    <tbody>
                        @foreach ($departemen as $d)
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                        <label class="form-check-label" for="contacusercheck1"></label>
                                    </div>
                                </th>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary">{{ $d->kode_dept }}</a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="badge badge-soft-primary">{{ $d->nama_dept }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="edit" id="edit"
                                            kode_dept={{ "$d->kode_dept" }}><button class="class btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></button></i></a>

                                        <form action="/departemen/{{ $d->kode_dept }}/delete" style="margin-left: 5px"
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
            </div><!-- end table responsive -->

            <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="addContactModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addContactModalLabel">Edit Data Kecamatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <!-- end modalheader -->
                        <div class="modal-body p-4" id="loadeditform">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-0 text-center text-sm-start">
            <div class="col-sm-6">
                <div>

                </div>
            </div>
            <!-- end col -->
            <div class="col-sm-6">

            </div><!-- end col -->
        </div><!-- end row -->
    </div>
@endsection

@push('myscript')
    <script>
        $(function() {

            $(".edit").click(function() {
                var kode_dept = $(this).attr('kode_dept');

                $.ajax({
                    type: 'POST',
                    url: '/departemen/edit',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        kode_dept: kode_dept
                    },
                    success: function(respond) {
                        $("#loadeditform").html(respond);
                    }
                });

                $("#editData").modal("show");
            });

            $("#frmKaryawan").submit(function() {

                var kode_dept = $("#kode_dept").val();
                var nama_dept = $("#kode_nama").val();

            });
        });
    </script>
@endpush
