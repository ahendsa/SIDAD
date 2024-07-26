<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $query = Karyawan::query();
        $query->select('karyawan.*', 'nama_dept', 'nama_cabang');
        $query->join('cabang', 'karyawan.kode_cabang', '=', 'cabang.kode_cabang');
        $query->join('departemen', 'karyawan.kode_dept', '=', 'departemen.kode_dept');

        $query->orderBy('nama_lenkap');

        if (!empty($request->nama_karyawan)) {
            $query->where('nama_lenkap', 'like', '%' . $request->nama_karyawan . '%');
        }


        if (!empty($request->nama_departemen)) {
            $query->where('nama_dept', 'like', '%' . $request->nama_departemen . '%');
        }
        $karyawan = $query->paginate(50);
        $departemen = DB::table('departemen')->get();
        $cabang = DB::table('cabang')->get();

        return view('karyawan.index', compact('karyawan', 'departemen', 'cabang'));
    }

    public function store(Request $request)
    {
        $nik = $request->nik;
        $nama_lenkap = $request->nama_lenkap;
        $jabatan = $request->jabatan;
        $no_hp = $request->no_hp;
        $kode_dept = $request->kode_dept;
        $kode_cabang = $request->kode_cabang;

        $password = Hash::make('12345');



        if ($request->hasFile('foto')) {
            $foto = $nik . "." . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = null;
        }

        try {
            $data = [
                'nik' => $nik,
                'nama_lenkap' => $nama_lenkap,
                'jabatan' => $jabatan,
                'no_hp' => $no_hp,
                'kode_dept' => $kode_dept,
                'kode_cabang' => $kode_cabang,
                'foto' => $foto,
                'password' => $password
            ];


            $simpan = DB::table('karyawan')->insert($data);
            if ($simpan) {
                if ($request->hasFile('foto')) {
                    $folderPath = "public/uploads/karyawan/";
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            //  dd($e);
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }
    public function edit(Request $request)
    {
        $nik = $request->nik;
        $departemen = DB::table('departemen')->get();
        $cabang = DB::table('cabang')->get();
        $karyawan = DB::table('karyawan')->where('nik', $nik)->first();
        return view('karyawan.edit', compact('departemen', 'cabang', 'karyawan'));
    }

    public function update($nik, Request $request)
    {
        $nik = $request->nik;
        $nama_lenkap = $request->nama_lenkap;
        $jabatan = $request->jabatan;
        $no_hp = $request->no_hp;
        $kode_dept = $request->kode_dept;
        $kode_cabang = $request->kode_cabang;
        $old_foto = $request->old_foto;

        $password = Hash::make('12345');

        if ($request->hasFile('foto')) {
            $foto = $nik . "." . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = $old_foto;
        }

        try {
            $data = [
                'nama_lenkap' => $nama_lenkap,
                'jabatan' => $jabatan,
                'no_hp' => $no_hp,
                'kode_dept' => $kode_dept,
                'kode_cabang' => $kode_cabang,
                'foto' => $foto,
                'password' => $password
            ];


            $update = DB::table('karyawan')->where('nik', $nik)->update($data);

            if ($update) {
                if ($request->hasFile('foto')) {
                    $folderPath = "public/uploads/karyawan/";
                    $folderPathOld = "public/uploads/karyawan/" . $old_foto;
                    Storage::delete($folderPathOld);
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Di Update']);
            }
        } catch (\Exception $e) {
            //  dd($e);
            return Redirect::back()->with(['warning' => 'Data Gagal Di Update']);
        }
    }

    public function delete($nik)
    {
        $delete = DB::table('karyawan')->where('nik', $nik)->delete();
        if ($delete) {
            return redirect::back()->with(['succes' => 'Data Berhasil di hapus']);
        } else {
            return redirect::back()->with(['succes' => 'Data Gagal di hapus']);
        }
    }
}