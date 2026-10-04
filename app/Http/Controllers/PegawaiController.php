<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        // Calculate Statistics
        $totalPegawai = DB::table('pegawai')->count();
        $totalSatker = DB::table('unit_kerja')->count();
        
        $pnsCount = DB::table('pegawai')
            ->join('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
            ->whereIn('nama_status', ['PNS Aktif', 'CPNS'])
            ->count();
            
        $pppkCount = DB::table('pegawai')
            ->join('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
            ->where('nama_status', 'P3K Aktif')
            ->count();
            
        $honorerCount = DB::table('pegawai')
            ->join('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
            ->whereNotIn('nama_status', ['PNS Aktif', 'CPNS', 'P3K Aktif'])
            ->count();
            
        $pnsPercentage = $totalPegawai > 0 ? round(($pnsCount / $totalPegawai) * 100, 1) : 0;

        // Fetch Options for Filters
        $unitKerjas = DB::table('unit_kerja')->orderBy('nama_unit')->get();
        $statuses = DB::table('status_pegawai')->orderBy('nama_status')->get();
        $golongans = DB::table('golongan')->orderBy('nama_golongan')->get();

        // Get pegawais with filters
        $search = $request->input('search');
        $unitKerjaId = $request->input('unit_kerja_id');
        $statusPegawaiId = $request->input('status_pegawai_id');
        $golonganId = $request->input('golongan_id');

        $query = DB::table('pegawai')
            ->leftJoin('riwayat_jabatan', function ($join) {
                $join->on('pegawai.id', '=', 'riwayat_jabatan.pegawai_id')
                     ->where('riwayat_jabatan.status_aktif', true);
            })
            ->leftJoin('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
            ->leftJoin('unit_kerja', 'riwayat_jabatan.unit_kerja_id', '=', 'unit_kerja.id')
            ->leftJoin('golongan', 'riwayat_jabatan.golongan_id', '=', 'golongan.id')
            ->leftJoin('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
            ->select(
                'pegawai.*',
                'jabatan.nama_jabatan',
                'unit_kerja.nama_unit',
                'golongan.nama_golongan',
                'status_pegawai.nama_status',
                'riwayat_jabatan.tmt_jabatan'
            );

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('pegawai.nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('pegawai.nip', 'like', "%{$search}%")
                  ->orWhere('jabatan.nama_jabatan', 'like', "%{$search}%");
            });
        }
        
        if ($unitKerjaId) {
            $query->where('riwayat_jabatan.unit_kerja_id', $unitKerjaId);
        }
        
        if ($statusPegawaiId) {
            $query->where('pegawai.status_pegawai_id', $statusPegawaiId);
        }
        
        if ($golonganId) {
            $query->where('riwayat_jabatan.golongan_id', $golonganId);
        }

        $pegawais = $query->paginate(10)->appends($request->all());

        return view('pegawai.index', compact(
            'pegawais', 'totalPegawai', 'totalSatker', 'pnsCount', 'pnsPercentage', 'pppkCount', 'honorerCount',
            'unitKerjas', 'statuses', 'golongans'
        ));
    }

    public function show($id)
    {
        $pegawai = DB::table('pegawai')
            ->leftJoin('riwayat_jabatan', function ($join) {
                $join->on('pegawai.id', '=', 'riwayat_jabatan.pegawai_id')
                     ->where('riwayat_jabatan.status_aktif', true);
            })
            ->leftJoin('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
            ->leftJoin('unit_kerja', 'riwayat_jabatan.unit_kerja_id', '=', 'unit_kerja.id')
            ->leftJoin('golongan', 'riwayat_jabatan.golongan_id', '=', 'golongan.id')
            ->leftJoin('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
            ->select(
                'pegawai.*',
                'jabatan.nama_jabatan',
                'jabatan.eselon',
                'jabatan.jenis as jenis_jabatan',
                'unit_kerja.nama_unit',
                'golongan.nama_golongan',
                'golongan.pangkat',
                'status_pegawai.nama_status',
                'riwayat_jabatan.tmt_jabatan'
            )
            ->where('pegawai.id', $id)
            ->first();

        if (!$pegawai) {
            abort(404);
        }
        
        $pendidikan = DB::table('riwayat_pendidikan')->where('pegawai_id', $id)->get();

        return view('pegawai.show', compact('pegawai', 'pendidikan'));
    }
}
