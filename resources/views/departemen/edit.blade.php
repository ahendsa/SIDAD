<form action="/departemen/{{ $departemen->kode_dept }}/update" method="POST" id="frmdepartemen"
    enctype="multipart/form-data">
    @csrf
    <div>
        <div class="mb-3">
            <label for="addcontact-name-input" class="form-label">Kode</label>
            <input type="text" class="form-control" id="kode_dept" name="kode_dept" placeholder="Masukan kode"
                value="{{ $departemen->kode_dept }}">
        </div>
        <div class="mb-3">
            <label for="addcontact-name-input" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" id="nama_dept" name="nama_dept" placeholder="Kecamatan"
                value="{{ $departemen->nama_dept }}">
        </div>

        <div class="mb-3 mt-2">
            <form-group>
                <button class="btn btn-success w-100" w=>Update</button>
            </form-group>
        </div>

    </div>
</form>
