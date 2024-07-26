<form action="/karyawan/{{ $karyawan->nik }}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="mb-3">
            <input type="hidden" class="form-control" id="nik" name="nik" placeholder="Masukan Nik"
                value="{{ $karyawan->nik }}">
        </div>
        <div class="mb-3">
            <label for="addcontact-name-input" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_lenkap" name="nama_lenkap" placeholder="Nama Lengkap"
                value="{{ $karyawan->nama_lenkap }}">
        </div>
        <div class="mb-3">
            <label for="addcontact-designation-input" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan"
                value="{{ $karyawan->jabatan }}">
        </div>
        <div class="mb-3">
            <label for="addcontact-designation-input" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP"
                value="{{ $karyawan->no_hp }}">
        </div>


        <div class="mb-3">
            <label class="col-md-2 col-form-label">Kecamatan</label>
            <select name="kode_dept" id="kode_dept" class="form-select">
                <option value=""> Kecamatan </option>
                @foreach ($departemen as $d)
                    <option {{ $karyawan->kode_dept == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">
                        {{ $d->nama_dept }}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label class="col-md-2 col-form-label">Desa</label>
            <select name="kode_cabang" id="kode_cabang" class="form-select">
                <option value=""> Desa </option>
                @foreach ($cabang as $d)
                    <option {{ $karyawan->kode_cabang == $d->kode_cabang ? 'selected' : '' }}
                        value="{{ $d->kode_cabang }}">
                        {{ $d->nama_cabang }}</option>
                @endforeach
            </select>

        </div>


        <div class="mb-3">
            <label for="addcontact-file-input" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <input type="hidden" name="old_foto" value="{{ $karyawan->foto }}">
        </div>
        <div class="mb-3">
            <form-group>
                <button class="btn btn-success w-100"><i class="fa fa-upload"> Update</i></button>
            </form-group>
        </div>
    </div>
</form>
