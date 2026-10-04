@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="bg-primary text-white rounded-xl p-5 md:p-8 mb-6 flex flex-col md:flex-row justify-between items-start md:items-center relative overflow-hidden shadow-lg gap-6">
        <div class="relative z-10 w-full max-w-3xl">
            <div class="flex items-center gap-2 mb-3 text-xs font-semibold text-blue-200 uppercase tracking-wider">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Sinkronisasi SAPK BKN Terhubung &bull; Periode
                Aktif: Triwulan II - 2025
            </div>
            <h2 class="text-3xl font-bold mb-3">Selamat Datang di SIKPEG</h2>
            <p class="text-blue-100 text-sm leading-relaxed">Sistem Pengelolaan Administrasi dan Rekam Jejak Pegawai
                Terpadu. Menampilkan status kepegawaian terkini, verifikasi mutasi, serta komposisi aparatur sipil negara.
            </p>
        </div>
        <div class="relative z-10 flex flex-col sm:flex-row gap-3 w-full md:w-auto mt-4 md:mt-0">
            <a href="/pegawai"
                class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2.5 rounded-lg text-sm font-semibold flex items-center justify-center gap-2 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Data Kepegawaian
            </a>
            <button
                class="bg-white/10 dark:bg-slate-800/20 hover:bg-white/20 dark:hover:bg-slate-800/40 text-white border border-white/20 px-4 py-2.5 rounded-lg text-sm font-semibold flex items-center justify-center gap-2 transition-colors w-full sm:w-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Cetak Laporan
            </button>
        </div>
        <!-- Decorative -->
        <div
            class="absolute right-0 top-0 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50 translate-x-1/2 -translate-y-1/2">
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
        <!-- Stat 1 -->
        <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total Pegawai</p>
                <div class="p-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-md"><svg class="w-4 h-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ number_format($totalPegawai) }}</h3>
            <p class="text-xs text-emerald-600 mt-2 font-medium flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                    </path>
                </svg>
                +12 pegawai bulan ini
            </p>
        </div>
        <!-- Stat 2 -->
        <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">PNS / Tetap</p>
                <div class="p-1.5 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-md"><svg class="w-4 h-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.{{ $golonganData['I'] }}6a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ number_format($pnsCount) }}</h3>
            <div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-3 overflow-hidden">
                    <div class="bg-blue-600 h-full rounded-full" style="width: 73.2%"></div>
                </div>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-1.5 font-medium">
                    {{ $totalPegawai > 0 ? round(($pnsCount / $totalPegawai) * 100, 1) : 0 }}% dari total pegawai</p>
            </div>
        </div>
        <!-- Stat 3 -->
        <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">PPPK / Kontrak</p>
                <div class="p-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-md"><svg class="w-4 h-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.{{ $golonganData['I'] }}6a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                        </path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ number_format($pppkCount) }}</h3>
            <div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-3 overflow-hidden">
                    <div class="bg-blue-400 h-full rounded-full" style="width: 26.8%"></div>
                </div>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-1.5 font-medium">
                    {{ $totalPegawai > 0 ? round(($pppkCount / $totalPegawai) * 100, 1) : 0 }}% dari total pegawai</p>
            </div>
        </div>
        <!-- Stat 4 -->
        <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Cuti & Mutasi</p>
                <div class="p-1.5 bg-orange-50 text-orange-500 rounded-md"><svg class="w-4 h-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                        </path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">24</h3>
            <p class="text-xs text-orange-500 mt-2 font-medium flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Menunggu Persetujuan
            </p>
        </div>
        <!-- Stat 5 -->
        <div class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">BUP Tahun Ini</p>
                <div class="p-1.5 bg-rose-50 dark:bg-rose-900/30 text-rose-500 dark:text-rose-400 rounded-md"><svg class="w-4 h-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">18</h3>
            <div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-3 overflow-hidden">
                    <div class="bg-rose-500 h-full rounded-full" style="width: 15%"></div>
                </div>
                <p class="text-[10px] text-rose-500 mt-1.5 font-medium">SK BUP dalam proses</p>
            </div>
        </div>
    </div>

    <!-- Middle Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Left: Komposisi Golongan -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="text-base font-bold text-slate-800 dark:text-slate-100">Komposisi Pegawai Berdasarkan Golongan</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Struktur kepangkatan aparatur sipil periode berjalan</p>
                </div>
                <span class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-[10px] font-bold px-2 py-1 rounded">BKN Grade</span>
            </div>

            <!-- Progress Bar Stack -->
            <div class="w-full flex h-6 rounded-md overflow-hidden mb-8 shadow-inner">
                <div class="bg-[#1a365d] h-full flex items-center justify-center text-[10px] font-bold text-white"
                    style="width: {{ $totalPegawai > 0 ? round(($golonganData['IV'] / $totalPegawai) * 100) : 0 }}%">18%
                </div>
                <div class="bg-[#2b6cb0] h-full flex items-center justify-center text-[10px] font-bold text-white"
                    style="width: {{ $totalPegawai > 0 ? round(($golonganData['III'] / $totalPegawai) * 100) : 0 }}%">52%
                </div>
                <div class="bg-[#63b3ed] h-full flex items-center justify-center text-[10px] font-bold text-white"
                    style="width: {{ $totalPegawai > 0 ? round(($golonganData['II'] / $totalPegawai) * 100) : 0 }}%">26%
                </div>
                <div class="bg-[#bee3f8] h-full flex items-center justify-center text-[10px] font-bold text-slate-600 dark:text-slate-300"
                    style="width: {{ $totalPegawai > 0 ? round(($golonganData['I'] / $totalPegawai) * 100) : 0 }}%">4%</div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-auto">
                <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-3 border border-slate-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 mb-1"><span class="w-2 h-2 rounded-full bg-[#1a365d]"></span><span
                            class="text-[10px] font-bold text-slate-700 dark:text-slate-200">Golongan IV</span></div>
                    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100">{{ $golonganData['IV'] }}</h4>
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 leading-tight mt-1">Pembina / Utama
                        ({{ $totalPegawai > 0 ? round(($golonganData['IV'] / $totalPegawai) * 100) : 0 }}%)</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-3 border border-slate-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 mb-1"><span class="w-2 h-2 rounded-full bg-[#2b6cb0]"></span><span
                            class="text-[10px] font-bold text-slate-700 dark:text-slate-200">Golongan III</span></div>
                    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100">{{ $golonganData['III'] }}</h4>
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 leading-tight mt-1">Penata / Muda
                        ({{ $totalPegawai > 0 ? round(($golonganData['III'] / $totalPegawai) * 100) : 0 }}%)</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-3 border border-slate-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 mb-1"><span class="w-2 h-2 rounded-full bg-[#63b3ed]"></span><span
                            class="text-[10px] font-bold text-slate-700 dark:text-slate-200">Golongan II</span></div>
                    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100">{{ $golonganData['II'] }}</h4>
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 leading-tight mt-1">Pengatur
                        ({{ $totalPegawai > 0 ? round(($golonganData['II'] / $totalPegawai) * 100) : 0 }}%)</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-3 border border-slate-100 dark:border-slate-700">
                    <div class="flex items-center gap-1.5 mb-1"><span class="w-2 h-2 rounded-full bg-[#bee3f8]"></span><span
                            class="text-[10px] font-bold text-slate-700 dark:text-slate-200">Golongan I</span></div>
                    <h4 class="text-lg font-bold text-slate-800 dark:text-slate-100">{{ $golonganData['I'] }}</h4>
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 leading-tight mt-1">Juru
                        ({{ $totalPegawai > 0 ? round(($golonganData['I'] / $totalPegawai) * 100) : 0 }}%)</p>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center text-xs">
                <span class="text-slate-500 dark:text-slate-400 flex items-center gap-1"><svg class="w-4 h-4 text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg> Validasi kepangkatan berkala otomatis setiap 6 bulan</span>
                <a href="#" class="font-semibold text-primary hover:underline flex items-center gap-1">Lihat Analisis
                    Lengkap <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg></a>
            </div>
        </div>

        <!-- Right: Distribusi Unit Kerja -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="text-base font-bold text-slate-800 dark:text-slate-100">Distribusi Unit Kerja Terbesar</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Konsentrasi alokasi personel OPD</p>
                </div>
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </div>

            <div class="space-y-4">
                @forelse($unitKerjaStats as $index => $uk)
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <span class="text-slate-400 font-bold text-xs w-4">{{ $index + 1 }}</span>
                            <p class="text-sm font-bold text-slate-800 dark:text-slate-100 group-hover:text-primary transition-colors">
                                {{ $uk->nama_unit }}</p>
                        </div>
                        <p class="text-xs font-bold text-slate-600 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 px-2.5 py-1 rounded-md">{{ $uk->total }} Pegawai
                        </p>
                    </div>
                @empty
                    <p class="text-sm text-slate-500 dark:text-slate-400">Belum ada data unit kerja.</p>
                @endforelse
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center text-xs">
                <span class="text-slate-500 dark:text-slate-400">Total {{ count($unitKerjaStats) }} Unit Kerja Terdaftar</span>
                <a href="#" class="font-semibold text-primary hover:underline flex items-center gap-1">Struktur Organisasi <svg
                        class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg></a>
            </div>
        </div>
    </div>

    <!-- Bottom Table -->
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm overflow-hidden">
        <div class="p-4 md:p-5 border-b border-slate-200 dark:border-slate-600 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-slate-50 dark:bg-slate-900">
            <div>
                <div class="flex items-center gap-2">
                    <h3 class="text-sm font-bold text-slate-800 dark:text-slate-100">Pegawai Baru & Perubahan Jabatan Terkini</h3>
                    <span class="bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-400 text-[10px] font-bold px-2 py-0.5 rounded-full">7 Terkini</span>
                </div>
                <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Daftar SK Pengangkatan, Mutasi Internal, dan Promosi Jabatan
                    ASN Periode Ini</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                <div class="relative w-full sm:w-auto">
                    <select
                        class="appearance-none bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-500 text-slate-700 dark:text-slate-200 text-xs font-semibold py-1.5 pl-3 pr-8 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <option>Semua Status</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-500 dark:text-slate-400">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <button
                    class="w-full sm:w-auto bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 px-3 py-1.5 rounded-md text-xs font-semibold flex items-center justify-center gap-1 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Cetak Daftar
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-900 text-[10px] uppercase tracking-wider text-slate-500 dark:text-slate-400 border-b border-slate-200 dark:border-slate-600">
                        <th class="p-4 font-bold w-1/4">Pegawai & NIP</th>
                        <th class="p-4 font-bold w-1/4">Unit Kerja Asal / Tujuan</th>
                        <th class="p-4 font-bold">Jabatan Definitif</th>
                        <th class="p-4 font-bold">Golongan</th>
                        <th class="p-4 font-bold">TMT Berlaku</th>
                        <th class="p-4 font-bold">Status / Tipe</th>
                        <th class="p-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-xs divide-y divide-slate-100">
                    @forelse($recentMutasi as $m)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($m->nama_lengkap) }}&background=f1f5f9"
                                        alt="User" class="w-8 h-8 rounded-full">
                                    <div>
                                        <a href="/pegawai/{{ $m->id }}"
                                            class="font-bold text-slate-800 dark:text-slate-100 hover:text-blue-600">{{ $m->gelar_depan }}
                                            {{ $m->nama_lengkap }}{{ $m->gelar_belakang ? ', ' . $m->gelar_belakang : '' }}</a>
                                        <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">{{ $m->nip }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <p class="font-semibold text-slate-800 dark:text-slate-100">{{ $m->nama_unit }}</p>
                            </td>
                            <td class="p-4 font-semibold text-slate-800 dark:text-slate-100">{{ $m->nama_jabatan }}</td>
                            <td class="p-4"><span
                                    class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 font-bold px-2.5 py-1 rounded">{{ $m->nama_golongan }}</span>
                            </td>
                            <td class="p-4">
                                <p class="text-slate-800 dark:text-slate-100">{{ \Carbon\Carbon::parse($m->tmt_jabatan)->format('d M') }}</p>
                                <p class="text-slate-500 dark:text-slate-400">{{ \Carbon\Carbon::parse($m->tmt_jabatan)->format('Y') }}</p>
                            </td>
                            <td class="p-4"><span
                                    class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded">Update
                                    Data</span></td>
                            <td class="p-4 text-center">
                                <a href="/pegawai/{{ $m->id }}"
                                    class="inline-block text-blue-600 hover:bg-blue-50 p-1.5 rounded transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-500 dark:text-slate-400">Belum ada pembaruan data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900 flex justify-between items-center text-xs">
            <span class="text-slate-500 dark:text-slate-400">Menampilkan <strong>{{ count($recentMutasi) }}</strong> pembaruan data
                terakhir</span>
        </div>
    </div>
@endsection