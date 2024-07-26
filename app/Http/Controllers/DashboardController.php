<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $hariini = date("Y-m-d");
        $bulanini = date('m') * 1;
        $tahunini = date("Y");
        $status = ("status");
        $nik = Auth::guard('karyawan')->user()->nik;
        $absensihariini = DB::table('presensi')->where('nik', $nik)->where('tgl_presensi', $hariini)->first();
        $historibulanini = DB::table('presensi')->whereRaw('MONTH(tgl_presensi)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_presensi)="' . $tahunini . '"')
            ->orderBy('tgl_presensi')
            ->get();

        $rekappresensi = DB::table('presensi')
            ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > "07:00",1,0)) as jmlterlambat')
            ->where('nik', $nik)
            ->whereRaw('MONTH(tgl_presensi)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_presensi)="' . $tahunini . '"')
            ->first();

        $leaderboard = DB::table('presensi')
            ->join('karyawan', 'presensi.nik', '=', 'karyawan.nik')
            ->where('tgl_presensi', $hariini)
            ->orderBy('jam_in')
            ->get();

        $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];


        $rekapizin = DB::table('tbl_izin')
            ->selectRaw('SUM(IF(status="1",1,0)) as jmlizin,SUM(IF(status="2",1,0)) as jmlsakit')
            ->where('nik', $nik)
            ->whereRaw('MONTH(tgl_izin)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_izin)="' . $tahunini . '"')
            ->first();
        return view('dashboard.dashboard', compact('absensihariini', 'historibulanini', 'namabulan', 'bulanini', 'tahunini', 'rekappresensi', 'leaderboard', 'rekapizin'));
    }

    public function admin()
    {
        $hariini = date("Y,m,d");
        $rekappresensi = DB::table('presensi')
            ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > "07:00",1,0)) as jmlterlambat')
            ->where('tgl_presensi', $hariini)
            ->first();

        $rekapizin = DB::table('tbl_izin')
            ->selectRaw('SUM(IF(status="1",1,0)) as jmlizin,SUM(IF(status="2",1,0)) as jmlsakit')
            ->where('tgl_izin', $hariini)
            ->first();

        return view('dashboard.dashboardadmin', compact('rekappresensi', 'rekapizin'));
    }
}
