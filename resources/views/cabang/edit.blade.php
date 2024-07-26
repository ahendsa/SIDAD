<form action="/cabang/{{ $cabang->kode_cabang }}/update" method="POST" id="frmcabang" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="mb-3">
            <label for="addcontact-name-input" class="form-label">Kode</label>
            <input type="text" class="form-control" id="kode_cabang" name="kode_cabang" placeholder="Masukan kode"
                value="{{ $cabang->kode_cabang }}">
        </div>
        <div class="mb-3">
            <label for="addcontact-name-input" class="form-label">Nama Desa</label>
            <input type="text" class="form-control" id="nama_cabang" name="nama_cabang" placeholder="Nama Desa"
                value="{{ $cabang->nama_cabang }}">
        </div>
        <div class="mb-3">
            <label for="addcontact-name-input" class="form-label">Lokasi Kantor</label>
            <input type="text" class="form-control" id="lokasi_cabang" name="lokasi_cabang"
                placeholder="Lokasi Kantor" value="{{ $cabang->lokasi_cabang }}">
        </div>
        <div class="mb-3">
            <label for="addcontact-name-input" class="form-label">Radius</label>
            <input type="text" class="form-control" id="radius" name="radius" placeholder="Radius"
                value="{{ $cabang->radius }}">
        </div>
        <div class="mb-3 mt-2">
            <form-group>
                <button class="btn btn-success w-100" w=>simpan</button>
            </form-group>
        </div>

    </div>
</form>
