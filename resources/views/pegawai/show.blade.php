@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="mb-4 text-xs text-slate-500 dark:text-slate-400 font-medium flex items-center gap-2">
    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
    <a href="/" class="hover:text-primary">Dashboard</a> &rsaquo; 
    <a href="/pegawai" class="hover:text-primary">Data Pegawai</a> &rsaquo; 
    <span class="text-slate-800 dark:text-slate-100 font-semibold">Drs. {{ $pegawai->nama_lengkap }}, M.AP (19790815 200501 1 004)</span>
</div>

<!-- Profile Header Banner -->
<div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm overflow-hidden mb-6">
    <!-- Blue Banner Top -->
    <div class="h-32 bg-primary relative overflow-hidden">
        <div class="absolute right-0 top-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute top-4 right-4">
            <span class="bg-emerald-500/20 text-emerald-100 border border-emerald-400/30 px-3 py-1 rounded-full text-[10px] font-bold flex items-center gap-1.5 backdrop-blur-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> SIMPEG TERVERIFIKASI BKN
            </span>
        </div>
    </div>
    
    <!-- Profile Info -->
    <div class="px-6 pb-6 relative">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 -mt-12 mb-4">
            <div class="flex items-end gap-5">
                <!-- Avatar -->
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Agus+Budiman&background=cbd5e1&color=1e293b&size=200" alt="Profile" class="w-32 h-32 rounded-xl border-4 border-white dark:border-slate-800 shadow-md object-cover bg-slate-200 dark:bg-slate-600">
                    <button class="absolute bottom-2 right-2 p-1.5 bg-slate-800/70 text-white rounded-lg hover:bg-slate-900 backdrop-blur-sm transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </button>
                </div>
                <!-- Details -->
                <div class="pb-2">
                    <div class="flex items-center gap-2 mb-1">
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Drs. {{ $pegawai->nama_lengkap }}, M.AP</h2>
                        <span class="bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 text-[10px] font-bold px-2 py-0.5 rounded border border-blue-200">Eselon III.a</span>
                    </div>
                    <div class="space-y-1 mt-2">
                        <p class="text-xs text-slate-600 dark:text-slate-300 font-medium flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg> 
                            NIP. 19790815 200501 1 004
                            <button class="text-slate-400 hover:text-primary"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg></button>
                        </p>
                        <p class="text-xs text-slate-600 dark:text-slate-300 font-medium flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Kepala Bagian Organisasi & Tata Laksana &bull; Sekretariat Daerah Kab. Purwakarta
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="flex flex-col gap-2 w-full md:w-auto mt-4 md:mt-0">
                <div class="flex gap-2">
                    <button class="flex-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 px-4 py-2 rounded-lg text-xs font-semibold flex items-center justify-center gap-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Unduh Arsip Digital
                    </button>
                    <button class="flex-1 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 px-4 py-2 rounded-lg text-xs font-semibold flex items-center justify-center gap-2 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Cetak DRH
                    </button>
                </div>
                <button class="w-full bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-xs font-semibold flex items-center justify-center gap-2 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Ubah Data Pegawai
                </button>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <div class="border-t border-slate-200 dark:border-slate-600 mt-2 pt-2 flex overflow-x-auto gap-1">
            <a href="#" class="border-b-2 border-primary text-primary px-4 py-3 text-xs font-bold flex items-center gap-2 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Identitas <span class="bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-400 text-[9px] px-1.5 py-0.5 rounded ml-1">100%</span>
            </a>
            <a href="#" class="border-b-2 border-transparent text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:text-slate-200 hover:border-slate-300 dark:border-slate-500 px-4 py-3 text-xs font-semibold flex items-center gap-2 whitespace-nowrap transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> Pekerjaan
            </a>
            <a href="#" class="border-b-2 border-transparent text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:text-slate-200 hover:border-slate-300 dark:border-slate-500 px-4 py-3 text-xs font-semibold flex items-center gap-2 whitespace-nowrap transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg> Pendidikan
            </a>
            <a href="#" class="border-b-2 border-transparent text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:text-slate-200 hover:border-slate-300 dark:border-slate-500 px-4 py-3 text-xs font-semibold flex items-center gap-2 whitespace-nowrap transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> Keluarga
            </a>
            <a href="#" class="border-b-2 border-transparent text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:text-slate-200 hover:border-slate-300 dark:border-slate-500 px-4 py-3 text-xs font-semibold flex items-center gap-2 whitespace-nowrap transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg> Jabatan
            </a>
            <a href="#" class="border-b-2 border-transparent text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:text-slate-200 hover:border-slate-300 dark:border-slate-500 px-4 py-3 text-xs font-semibold flex items-center gap-2 whitespace-nowrap transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg> Golongan
            </a>
            <a href="#" class="border-b-2 border-transparent text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:text-slate-200 hover:border-slate-300 dark:border-slate-500 px-4 py-3 text-xs font-semibold flex items-center gap-2 whitespace-nowrap transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Riwayat
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    
    <!-- LEFT COLUMN (WIDER) -->
    <div class="lg:col-span-2 space-y-6">
        
        <!-- Data Kependudukan -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm p-6">
            <div class="flex justify-between items-start mb-6">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg></div>
                    <div>
                        <h3 class="text-base font-bold text-slate-800 dark:text-slate-100">Data Kependudukan & Kepegawaian Dasar</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Informasi identitas sipil dan register resmi aparatur sipil negara</p>
                    </div>
                </div>
                <span class="bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 border border-blue-200 px-2.5 py-1 rounded-md text-[10px] font-bold flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Valid Dukcapil</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg relative">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Nomor Induk Kependudukan (NIK)</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100 tracking-wide">3214011508790003</p>
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg></button>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg relative">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">NIP (Format Baru 18 Digit)</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100 tracking-wide">19790815 200501 1 004</p>
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg></button>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">NIP Lama (Format 9 Digit)</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-100">480 128 554</p>
                    </div>
                    <span class="text-[10px] font-bold text-slate-400">Konversi 2008</span>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Gelar Depan & Belakang</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Drs. / M.AP</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Tempat, Tanggal Lahir</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Purwakarta, <span class="font-medium text-slate-600 dark:text-slate-300">15 Agustus 1979 (Usia: 45 Tahun)</span></p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Jenis Kelamin</p>
                    <p class="text-sm font-bold text-blue-700 flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Laki-laki</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Agama</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100">{{ $pegawai->agama }}</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Status Perkawinan</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-100">{{ $pegawai->status_perkawinan ?? "-" }}</p>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600">K/2 (Tunjangan Aktif)</span>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Golongan Darah & Rhesus</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-100 flex items-center gap-1.5"><span class="w-4 h-4 rounded-full bg-rose-100 text-rose-500 flex items-center justify-center text-[9px]">O</span> Positif (O+)</p>
                    </div>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg relative">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Kartu Pegawai (KARPEG) & TASPEN</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100">K.098231 / 900281928</p>
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg></button>
                </div>
            </div>
        </div>

        <!-- Kontak & Alamat -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></div>
                <div>
                    <h3 class="text-base font-bold text-slate-800 dark:text-slate-100">Kontak & Alamat Domisili Resmi</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Data komunikasi operasional kedinasan dan alamat tempat tinggal</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2 bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-4 rounded-lg">
                    <div class="flex justify-between items-start mb-2">
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider">Alamat KTP Lengkap</p>
                        <span class="text-[10px] font-bold text-blue-600 flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> Sesuai e-KTP</span>
                    </div>
                    <p class="text-sm font-semibold text-slate-800 dark:text-slate-100 leading-relaxed">Jl. Veteran No. 42, RT 003 / RW 008, Kel. Nagri Kaler, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat - Kode Pos 41115</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-4 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">No. Ponsel / WhatsApp</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2"><svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> +62 812-8849-2010</p>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-600">Terverifikasi OTP</span>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-4 rounded-lg relative">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Email Resmi Kedinasan</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2"><svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> agus.budiman@purwakartakab.go.id</p>
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg></button>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Email Cadangan (Pribadi)</p>
                    <p class="text-sm font-bold text-slate-700 dark:text-slate-200">agus.budiman.ugm@gmail.com</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-3 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1">Kontak Keadaan Darurat</p>
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Hj. Rina Marlina (Istri)</p>
                    </div>
                    <span class="text-xs font-bold text-blue-600">0813-2009-4412</span>
                </div>
            </div>
        </div>

        <!-- Ringkasan Posisi -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-sky-50 dark:bg-sky-900/30 text-sky-600 dark:text-sky-400 rounded-lg"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></div>
                    <h3 class="text-base font-bold text-slate-800 dark:text-slate-100">Ringkasan Posisi & Penugasan Saat Ini</h3>
                </div>
                <a href="#" class="text-xs font-semibold text-primary hover:underline flex items-center gap-1">Buka Detail Jabatan <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-4 rounded-lg">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1.5">UNIT KERJA INDUK</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Sekretariat Daerah</p>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1">Kabupaten Purwakarta</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-4 rounded-lg">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1.5">BAGIAN / BIRO</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Organisasi & Tatalaksana</p>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1">Kepala Bagian (Eselon III.a)</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-4 rounded-lg">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider mb-1.5">TMT JABATAN TERAKHIR</p>
                    <p class="text-sm font-bold text-slate-800 dark:text-slate-100">14 Januari 2021</p>
                    <a href="#" class="text-[11px] font-bold text-emerald-600 mt-1 hover:underline block">SK Bupati No. 821.2/045</a>
                </div>
            </div>
        </div>

    </div>
    
    <!-- RIGHT COLUMN (NARROWER) -->
    <div class="space-y-6">
        
        <!-- Ringkasan Eksekutif -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm p-5">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-sm font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2"><svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg> Ringkasan Eksekutif</h3>
                <span class="text-[9px] font-bold text-slate-400 uppercase">Update Otomatis</span>
            </div>
            <div class="space-y-3">
                <div class="bg-slate-50 dark:bg-slate-900 p-3 rounded-lg flex items-start gap-3 border border-slate-100 dark:border-slate-700">
                    <div class="p-1.5 bg-primary text-white rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg></div>
                    <div>
                        <p class="text-[9px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Golongan / Pangkat Terakhir</p>
                        <p class="text-xs font-bold text-slate-800 dark:text-slate-100">{{ $pegawai->pangkat ?? "-" }} Tk. I (IV/b)</p>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-0.5">TMT: <a href="#" class="text-blue-600 font-semibold hover:underline">01 April 2022</a></p>
                    </div>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 p-3 rounded-lg flex items-start gap-3 border border-slate-100 dark:border-slate-700">
                    <div class="p-1.5 bg-blue-600 text-white rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                    <div>
                        <p class="text-[9px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Masa Kerja Golongan (MKG)</p>
                        <p class="text-xs font-bold text-slate-800 dark:text-slate-100">18 Tahun 4 Bulan</p>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-0.5">Masa Kerja Total (MKT): 19 Thn 1 Bln</p>
                    </div>
                </div>
                <div class="bg-blue-50/50 p-3 rounded-lg flex items-start gap-3 border border-blue-100">
                    <div class="p-1.5 bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg></div>
                    <div>
                        <p class="text-[9px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Pendidikan Terakhir Diakui BKN</p>
                        <p class="text-xs font-bold text-slate-800 dark:text-slate-100">S2 Magister Administrasi Publik</p>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-0.5 leading-tight">Universitas Gadjah Mada (Lulus 2012)</p>
                    </div>
                </div>
                <div class="bg-slate-50 dark:bg-slate-900 p-3 rounded-lg flex items-start gap-3 border border-slate-100 dark:border-slate-700">
                    <div class="p-1.5 bg-slate-200 dark:bg-slate-600 text-slate-600 dark:text-slate-300 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></div>
                    <div class="w-full">
                        <p class="text-[9px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Data Keluarga Tanggungan</p>
                        <p class="text-xs font-bold text-slate-800 dark:text-slate-100 mb-1.5">Istri (1) &bull; Anak (2)</p>
                        <div class="flex justify-between items-center text-[10px]">
                            <span class="font-bold text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded">KP4 Terbit 2024</span>
                            <span class="text-slate-500 dark:text-slate-400">3 Jiwa Tertanggung</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dokumen Terverifikasi -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm p-5">
            <div class="flex justify-between items-center mb-3">
                <h3 class="text-sm font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2">
                    <div class="p-1.5 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-lg"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                    Dokumen Terverifikasi
                </h3>
                <div class="text-right">
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">5/5 Lengkap</span>
                </div>
            </div>
            <p class="text-[11px] text-slate-500 dark:text-slate-400 mb-4 leading-relaxed">Dokumen legal kepegawaian telah diverifikasi oleh Tim Pengelola Kepegawaian BKPSDM.</p>
            
            <div class="space-y-2 mb-4">
                <div class="flex justify-between items-center bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-2.5 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div>
                            <p class="text-xs font-bold text-slate-800 dark:text-slate-100">KTP Elektronik</p>
                            <p class="text-[9px] text-slate-500 dark:text-slate-400">PDF (1.2 MB) &bull; TTD Digital Dukcapil</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:bg-blue-50 p-1.5 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                </div>
                <div class="flex justify-between items-center bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-2.5 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div>
                            <p class="text-xs font-bold text-slate-800 dark:text-slate-100">Kartu Keluarga (KK)</p>
                            <p class="text-[9px] text-slate-500 dark:text-slate-400">PDF (890 KB) &bull; Barcode QR</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:bg-blue-50 p-1.5 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                </div>
                <div class="flex justify-between items-center bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-2.5 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div>
                            <p class="text-xs font-bold text-slate-800 dark:text-slate-100">SK Pengangkatan CPNS (80%)</p>
                            <p class="text-[9px] text-slate-500 dark:text-slate-400">No: 813.2/021/BKD-2005</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:bg-blue-50 p-1.5 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                </div>
                <div class="flex justify-between items-center bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-2.5 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div>
                            <p class="text-xs font-bold text-slate-800 dark:text-slate-100">SK Kenaikan Pangkat IV/b</p>
                            <p class="text-[9px] text-slate-500 dark:text-slate-400">SK Gubernur Jabar &bull; TMT 01-04-2022</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:bg-blue-50 p-1.5 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                </div>
                <div class="flex justify-between items-center bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 p-2.5 rounded-lg">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div>
                            <p class="text-xs font-bold text-slate-800 dark:text-slate-100">Ijazah & Transkrip Legalisir S2</p>
                            <p class="text-[9px] text-slate-500 dark:text-slate-400">SK Penyetaraan BKN & Izin Belajar</p>
                        </div>
                    </div>
                    <button class="text-blue-600 hover:bg-blue-50 p-1.5 rounded"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></button>
                </div>
            </div>
            
            <div class="pt-3 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <span class="text-[10px] text-slate-500 dark:text-slate-400">Penyimpanan Arsip: 14.8 MB</span>
                <a href="#" class="text-xs font-semibold text-primary hover:underline flex items-center gap-1">Unggah SK Baru <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg></a>
            </div>
        </div>

        <!-- Proyeksi Kepegawaian -->
        <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm p-5">
            <h3 class="text-sm font-bold text-slate-800 dark:text-slate-100 mb-4 flex items-center gap-2">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Proyeksi Kepegawaian
            </h3>
            
            <div class="mb-4">
                <div class="flex justify-between items-start mb-1">
                    <p class="text-xs font-semibold text-slate-700 dark:text-slate-200">Kenaikan Gaji Berkala (KGB)<br>Berikutnya</p>
                    <p class="text-xs font-bold text-blue-600 text-right">01 April<br>2024</p>
                </div>
                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full mt-2 overflow-hidden"><div class="bg-blue-500 h-full rounded-full" style="width: 85%"></div></div>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-1.5">Sisa waktu 3 bulan menuju verifikasi otomatis</p>
            </div>
            
            <div class="pt-4 border-t border-slate-100 dark:border-slate-700">
                <div class="flex justify-between items-start mb-1">
                    <p class="text-xs font-semibold text-slate-700 dark:text-slate-200">Batas Usia Pensiun (BUP 58<br>Thn)</p>
                    <p class="text-xs font-bold text-slate-800 dark:text-slate-100 text-right">31 Agustus<br>2037</p>
                </div>
                <p class="text-[10px] font-bold text-emerald-600 mt-1.5">12 Tahun 8 Bulan masa pengabdian tersisa</p>
            </div>
        </div>
        
    </div>
</div>
@endsection
