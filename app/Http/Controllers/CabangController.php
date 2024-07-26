<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CabangController extends Controller
{
    public function cabang(Request $request)
    {
        $query = Cabang::query();
        $query->select('cabang.*', 'nama_cabang');
        if (!empty($request->nama_cabang)) {
            $query->where('nama_cabang', 'like', '%' . $request->nama_cabang . '%');
        }
        $karyawan = $query->paginate(50);
        $cabang = DB::table('cabang')->get();
        return view('cabang.index', compact('cabang'));
    }

    public function store(Request $request)
    {
        $kode_cabang = $request->kode_cabang;
        $nama_cabang = $request->nama_cabang;
        $lokasi_cabang = $request->lokasi_cabang;
        $radius = $request->radius;

        try {
            $data = [
                'kode_cabang' => $kode_cabang,
                'nama_cabang' => $nama_cabang,
                'lokasi_cabang' => $lokasi_cabang,
                'radius' => $radius,
            ];
            DB::table('cabang')->insert($data);
            return Redirect::back()->with(['success', 'Data Berhasil di Simpan']);
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning', 'Data Gagal di Simpan']);
        }
    }


    public function edit(Request $request)
    {
        $kode_cabang = $request->kode_cabang;

        $cabang = DB::table('cabang')->where('kode_cabang', $kode_cabang)->first();

        return view('cabang.edit', compact('cabang'));
    }

    public function update($kode_cabang, Request $request)
    {
        $kode_cabang = $request->kode_cabang;
        $nama_cabang = $request->nama_cabang;
        $lokasi_cabang = $request->lokasi_cabang;
        $radius = $request->radius;

        try {
            $data = [
                'kode_cabang' => $kode_cabang,
                'nama_cabang' => $nama_cabang,
                'lokasi_cabang' => $lokasi_cabang,
                'radius' => $radius,
            ];

            DB::table('cabang')->where('kode_cabang', $kode_cabang)->update($data);
            return Redirect::back()->with(['success', 'Data Berhasil di Update']);
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning', 'Data Gagal di Update']);
        }
    }

    public function delete($kode_cabang)
    {
        $delete = DB::table('karyawan')->where('kode_cabang', $kode_cabang)->delete();
        if ($delete) {
            return redirect::back()->with(['succes' => 'Data Berhasil di hapus']);
        } else {
            return redirect::back()->with(['succes' => 'Data Gagal di hapus']);
        }
    }
}