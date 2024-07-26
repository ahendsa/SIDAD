@extends('admin.layouts.index')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex align-items-center">
                            <h4 class="card-title">Monitor Absensi</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <input type="text" id="tanggal" name="tanggal" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Desa</th>
                                                <th scope="col">Jam Masuk</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col">Jam Pulang</th>
                                                <th scope="col">Foto</th>

                                            </tr>
                                        </thead>
                                        <tbody id="loadpresensi"></tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
@push('myscript')
    <script>
        $(function() {
            $("#tanggal").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });
            $("#tanggal").change(function(e) {
                var tanggal = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '/getpresensi',
                    data: {
                        _token: "{{ csrf_token() }}",
                        tanggal: tanggal
                    },
                    cache: false,
                    success: function(respond) {
                        $("#loadpresensi").html(respond);

                    }
                });
            });
        });
    </script>
@endpush
