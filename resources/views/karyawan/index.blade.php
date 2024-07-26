@extends('admin.layouts.index')
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
                                    <h5 class="card-title">DAFTAR ABSENSI APARATUR DESA <span </h5>
                                </div>
                            </div><!-- end col -->
                            <form action="/karyawan" method = "GET">
                                <div class="col-md-12">
                                    <div
                                        class="d-flex flex-wrap align-items-start justify-content-md-end mt-2 mt-md-0 gap-2 mb-3">

                                        <div class="form-group">
                                            <input type="text" name="nama_karyawan" id="nama_karyawan"
                                                class="form-control" placeholder="nama karyawan"
                                                value="{{ Request('nama_karyawan') }}">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nama_departemen" id="nama_departemen"
                                                class="form-control" placeholder="nama desa "
                                                value="{{ Request('nama_departemen') }}">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-soft-info"> Cari</button>

                                        </div>


                                    </div><!-- end dropdown -->
                                </div>


                            </form>
                        </div>
                        <div>
                            <a href="#" class="btn btn-light" id="btnTambah"><i class="uil uil-plus me-1"></i> Tambah
                            </a>
                        </div>
                    </div><!-- end col -->

                </div><!-- end row -->
                <!-- Modal -->
                <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="addContactModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addContactModalLabel">Tambah Aparatur Desa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- end modalheader -->
                            <div class="modal-body p-4">
                                <form action="/karyawan/store" method="POST" id="frmKaryawan"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <div class="mb-3">
                                            <label for="addcontact-name-input" class="form-label">Nik</label>
                                            <input type="text" class="form-control" id="nik" name="nik"
                                                placeholder="Masukan Nik">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addcontact-name-input" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama_lenkap" name="nama_lenkap"
                                                placeholder="Nama Lengkap">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addcontact-designation-input" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                placeholder="Jabatan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addcontact-designation-input" class="form-label">No HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                placeholder="No HP">
                                        </div>


                                        <div class="mb-3">
                                            <label class="col-md-2 col-form-label">Jabatan</label>
                                            <select name="kode_dept" id="kode_dept" name="kode_dept" class="form-select">
                                                <option value=""> Kecamatan </option>
                                                @foreach ($departemen as $d)
                                                    <option {{ Request('kode_dept') == $d->kode_dept ? 'selected' : '' }}
                                                        value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="mb-3">
                                            <label class="col-md-2 col-form-label">Kantor / Desa</label>
                                            <select id="kode_cabang" name="kode_cabang" class="form-select">
                                                <option value=""> Desa </option>
                                                @foreach ($cabang as $d)
                                                    <option
                                                        {{ Request('kode_cabang') == $d->kode_cabang ? 'selected' : '' }}
                                                        value="{{ $d->kode_cabang }}">{{ $d->nama_cabang }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="addcontact-file-input" class="form-label">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto">
                                        </div>
                                        <div class="mb-3">
                                            <form-group>
                                                <button class="btn btn-success w-100">simpan</button>
                                            </form-group>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <th scope="col">Foto</th>
                        <th scope="col">NIPD</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Desa</th>
                        <th style="width: 80px; min-width: 80px;">Action</th>
                    </tr><!-- end tr -->
                </thead><!-- end thead -->
                <tbody>
                    @foreach ($karyawan as $d)
                        @php
                            $path = Storage::url('uploads/karyawan/' . $d->foto);
                        @endphp
                        <tr>
                            <th scope="row">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                    <label class="form-check-label" for="contacusercheck1"></label>
                                </div>
                            </th>
                            <td>
                                <img src="{{ url($path) }}" alt="" class="avatar-sm rounded-circle me-2">

                            </td>
                            <td><span class="badge badge-soft-warning mb-0">{{ $d->nik }}</span></td>
                            <td>{{ $d->nama_lenkap }}</td>
                            <td>{{ $d->jabatan }}</td>
                            <td>
                                <a href="#" class="badge badge-soft-primary">{{ $d->nama_dept }}</a>
                            </td>
                            <td>
                                <a href="#" class="badge badge-soft-info">{{ $d->nama_cabang }}</a>
                            </td>

                            <td>
                                <div class="btn-group">
                                    <a href="#" class="edit" id="edit" nik={{ "$d->nik" }}><button
                                            class="class btn btn-primary btn-sm"> <i class="fa fa-edit"></button></i></a>

                                    <form action="/karyawan/{{ $d->nik }}/delete" style="margin-left: 5px"
                                        method="POST">
                                        @csrf
                                        <button class=" btn-danger btn-sm sa-warning"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>


                            </td>
                        </tr><!-- end tr -->
                    @endforeach
                </tbody><!-- end tbody -->

            </table><!-- end table -->
        </div><!-- end table responsive -->

        <div class="row g-0 text-center text-sm-start">
            <div class="col-sm-6">
                <div>
                    {{ $karyawan->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <!-- end col -->
            <div class="col-sm-6">

            </div><!-- end col -->
        </div><!-- end row -->
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContactModalLabel">Edit Aparatur Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- end modalheader -->
                <div class="modal-body p-4" id="loadeditform">

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function() {

            $("#btnTambah").click(function() {
                $("#tambahData").modal("show");

            });

            $(".edit").click(function() {
                var nik = $(this).attr('nik');
                $.ajax({
                    type: 'POST',
                    url: '/karyawan/edit',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        nik: nik
                    },
                    success: function(respond) {
                        $("#loadeditform").html(respond);
                    }
                });

                $("#editData").modal("show");


            });
            $(".sa-warning").click(function(e) {
                var form = $(this).closest('form');
                e.preventDefault();
                Swal.fire({
                    title: "Apakah anda akan menghapus data ?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Hapus!",
                            text: "Data berhasil dihapus.",
                            icon: "success"
                        });
                    }
                });
            });

            $("#frmKaryawan").submit(function() {
                var nik = $("#nik").val();
                var nama_lenkap = $("#nama_lenkap").val();
                var jabatan = $("#jabatan").val();
                var no_hp = $("#no_hp").val();
                var kode_dept = $("#kode_dept").val();
                var kode_cabang = $("#kode_cabang").val();
                if (nik == "") {
                    Swal.fire({
                        title: 'warning',
                        text: 'Nik harus diisi',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                    });
                }
            });

        });
    </script>
@endpush
