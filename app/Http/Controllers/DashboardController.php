<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = DB::table('pegawai')->count();
        
        $pnsCount = DB::table('pegawai')
            ->join('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
            ->whereIn('status_pegawai.nama_status', ['PNS Aktif', 'CPNS'])
            ->count();
            
        $pppkCount = DB::table('pegawai')
            ->join('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
            ->where('status_pegawai.nama_status', 'P3K Aktif')
            ->count();

        // 58 years ago
        $bupDate = Carbon::now()->subYears(58)->format('Y-m-d');
        $bupCount = DB::table('pegawai')
            ->where('tanggal_lahir', '<=', $bupDate)
            ->count();

        $golonganStats = DB::table('pegawai')
            ->join('riwayat_jabatan', function ($join) {
                $join->on('pegawai.id', '=', 'riwayat_jabatan.pegawai_id')
                     ->where('riwayat_jabatan.status_aktif', true);
            })
            ->join('golongan', 'riwayat_jabatan.golongan_id', '=', 'golongan.id')
            ->select('golongan.nama_golongan', DB::raw('count(*) as total'))
            ->groupBy('golongan.nama_golongan')
            ->get();
            
        $golonganData = [
            'IV' => 0, 'III' => 0, 'II' => 0, 'I' => 0
        ];
        foreach($golonganStats as $stat) {
            if (str_starts_with($stat->nama_golongan, 'IV')) $golonganData['IV'] += $stat->total;
            elseif (str_starts_with($stat->nama_golongan, 'III')) $golonganData['III'] += $stat->total;
            elseif (str_starts_with($stat->nama_golongan, 'II')) $golonganData['II'] += $stat->total;
            elseif (str_starts_with($stat->nama_golongan, 'I')) $golonganData['I'] += $stat->total;
        }

        $unitKerjaStats = DB::table('pegawai')
            ->join('riwayat_jabatan', function ($join) {
                $join->on('pegawai.id', '=', 'riwayat_jabatan.pegawai_id')
                     ->where('riwayat_jabatan.status_aktif', true);
            })
            ->join('unit_kerja', 'riwayat_jabatan.unit_kerja_id', '=', 'unit_kerja.id')
            ->select('unit_kerja.nama_unit', DB::raw('count(*) as total'))
            ->groupBy('unit_kerja.nama_unit')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $recentMutasi = DB::table('pegawai')
            ->join('riwayat_jabatan', function ($join) {
                $join->on('pegawai.id', '=', 'riwayat_jabatan.pegawai_id')
                     ->where('riwayat_jabatan.status_aktif', true);
            })
            ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
            ->join('unit_kerja', 'riwayat_jabatan.unit_kerja_id', '=', 'unit_kerja.id')
            ->join('golongan', 'riwayat_jabatan.golongan_id', '=', 'golongan.id')
            ->select(
                'pegawai.*',
                'jabatan.nama_jabatan',
                'unit_kerja.nama_unit',
                'golongan.nama_golongan',
                'riwayat_jabatan.tmt_jabatan',
                'riwayat_jabatan.created_at'
            )
            ->orderByDesc('riwayat_jabatan.tmt_jabatan')
            ->limit(5)
            ->get();

        return view('welcome', compact(
            'totalPegawai', 'pnsCount', 'pppkCount', 'bupCount', 
            'golonganData', 'unitKerjaStats', 'recentMutasi'
        ));
    }
}
