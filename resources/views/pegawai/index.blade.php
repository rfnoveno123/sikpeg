@extends('layouts.app')

@section('content')
    <div class="mb-4 text-sm text-slate-500 dark:text-slate-400 font-medium">
        <a href="/" class="hover:text-primary">Kepegawaian</a> &rsaquo; <span class="text-primary font-semibold">Data
            Pegawai</span>
    </div>

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start mb-6 gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-800 dark:text-slate-100 mb-1">Data Pegawai</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Daftar rekam data seluruh aparatur dan pegawai aktif di
                lingkungan instansi</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
            <button
                class="w-full sm:w-auto bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 px-4 py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-2 transition-colors">
                <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                </svg>
                Export
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <button
                class="w-full sm:w-auto bg-indigo-50 hover:bg-indigo-100 text-indigo-700 border border-indigo-200 px-4 py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                    </path>
                </svg>
                Import SIASN
            </button>
            <button
                class="w-full sm:w-auto bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center justify-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Tambah Pegawai
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div
            class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total Pegawai
                </p>
                <div class="p-1.5 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded-md"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ number_format($totalPegawai) }}</h3>
            <p class="text-xs text-blue-600 mt-2 font-medium flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                {{ $totalSatker }} Satker / OPD
            </p>
        </div>
        <div
            class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">PNS / ASN Aktif
                </p>
                <div class="p-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-md"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ number_format($pnsCount) }}</h3>
            <p class="text-xs text-emerald-600 mt-2 font-medium flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $pnsPercentage }}% Terverifikasi
            </p>
        </div>
        <div
            class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Pegawai P3K</p>
                <div class="p-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-md"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                        </path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ number_format($pppkCount) }}</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 font-medium flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                    </path>
                </svg>
                Kontrak Aktif
            </p>
        </div>
        <div
            class="bg-white dark:bg-slate-800 p-5 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm flex flex-col justify-between">
            <div class="flex justify-between items-start mb-2">
                <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Honorer &
                    Kontrak</p>
                <div class="p-1.5 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded-md"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg></div>
            </div>
            <h3 class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ number_format($honorerCount) }}</h3>
            <p class="text-xs text-rose-500 mt-2 font-medium flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Validasi Tahunan
            </p>
        </div>
    </div>

    <!-- Filters & Table Section -->
    <div
        class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm overflow-hidden mb-6">
        <!-- Filters -->
        <form id="filter-form" hx-get="/pegawai" hx-target="#app-wrapper" hx-select="#app-wrapper"
            hx-swap="outerHTML show:none"
            class="p-5 border-b border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800">
            <div class="flex flex-col md:flex-row gap-3 mb-4">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-600 text-slate-800 dark:text-slate-100 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-9 p-2.5"
                        placeholder="Cari berdasarkan NIP, Nama, atau Jabatan...">
                </div>

                <select name="unit_kerja_id" onchange="document.getElementById('filter-submit').click()"
                    class="bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-slate-200 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full md:w-48 p-2.5">
                    <option value="">Semua Unit Kerja ({{ count($unitKerjas) }})</option>
                    @foreach($unitKerjas as $uk)
                        <option value="{{ $uk->id }}" {{ request('unit_kerja_id') == $uk->id ? 'selected' : '' }}>
                            {{ $uk->nama_unit }}</option>
                    @endforeach
                </select>

                <select name="status_pegawai_id" onchange="document.getElementById('filter-submit').click()"
                    class="bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-slate-200 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full md:w-36 p-2.5">
                    <option value="">Semua Status</option>
                    @foreach($statuses as $st)
                        <option value="{{ $st->id }}" {{ request('status_pegawai_id') == $st->id ? 'selected' : '' }}>
                            {{ $st->nama_status }}</option>
                    @endforeach
                </select>

                <select name="golongan_id" onchange="document.getElementById('filter-submit').click()"
                    class="bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-600 text-slate-700 dark:text-slate-200 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full md:w-36 p-2.5">
                    <option value="">Semua Golongan</option>
                    @foreach($golongans as $gl)
                        <option value="{{ $gl->id }}" {{ request('golongan_id') == $gl->id ? 'selected' : '' }}>
                            {{ $gl->nama_golongan }}</option>
                    @endforeach
                </select>

                <button id="filter-submit" type="submit"
                    class="bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 text-slate-600 dark:text-slate-300 rounded-lg w-10 h-[42px] flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>

            @if(request()->anyFilled(['search', 'unit_kerja_id', 'status_pegawai_id', 'golongan_id']))
                <div class="flex flex-col sm:flex-row flex-wrap items-start sm:items-center gap-2 text-xs">
                    <span class="font-bold text-slate-700 dark:text-slate-200">Filter Aktif:</span>

                    @if(request('search'))
                        <span
                            class="bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 border border-blue-200 px-2.5 py-1 rounded-md font-semibold flex items-center gap-1">
                            Pencarian: <span class="font-bold">"{{ request('search') }}"</span>
                        </span>
                    @endif

                    @if(request('unit_kerja_id') || request('status_pegawai_id') || request('golongan_id'))
                        <span
                            class="bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 border border-blue-200 px-2.5 py-1 rounded-md font-semibold flex items-center gap-1">
                            Kriteria Aktif <svg class="w-3 h-3 ml-1 text-emerald-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    @endif

                    <a href="/pegawai" hx-boost="true" class="text-blue-600 hover:underline font-semibold ml-2">Hapus Semua
                        Filter</a>
                </div>
            @endif
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr
                        class="bg-white dark:bg-slate-800 text-[10px] uppercase tracking-wider text-slate-800 dark:text-slate-100 font-bold border-b border-slate-200 dark:border-slate-600">
                        <th class="p-4 w-12 text-center"><input type="checkbox"
                                onclick="document.querySelectorAll('.row-checkbox').forEach(c => c.checked = this.checked)"
                                class="rounded border-slate-300 dark:border-slate-500 text-primary focus:ring-primary"></th>
                        <th class="py-4 pr-4">Pegawai & NIP</th>
                        <th class="py-4 pr-4">Jabatan & Unit Kerja</th>
                        <th class="py-4 pr-4">Status</th>
                        <th class="py-4 pr-4">Golongan / TMT</th>
                        <th class="py-4 pr-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-xs divide-y divide-slate-100">
                    @forelse($pegawais as $p)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                            <td class="p-4 text-center"><input type="checkbox"
                                    class="row-checkbox rounded border-slate-300 dark:border-slate-500 text-primary focus:ring-primary">
                            </td>
                            <td class="py-4 pr-4">
                                <div class="flex items-start gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($p->nama_lengkap) }}&background=f1f5f9"
                                        alt="User" class="w-10 h-10 rounded-full object-cover">
                                    <div>
                                        <a href="/pegawai/{{ $p->id }}"
                                            class="font-bold text-slate-900 dark:text-white text-sm hover:text-blue-600 transition-colors">{{ $p->gelar_depan }}
                                            {{ $p->nama_lengkap }}{{ $p->gelar_belakang ? ', ' . $p->gelar_belakang : '' }}</a>
                                        <p
                                            class="text-slate-500 dark:text-slate-400 font-medium flex items-center gap-1 mt-0.5">
                                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                                </path>
                                            </svg> {{ $p->nip }}</p>
                                        <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">
                                            {{ $p->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }} &bull; Usia
                                            {{ \Carbon\Carbon::parse($p->tanggal_lahir)->age }} th</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 pr-4">
                                <p class="font-bold text-slate-800 dark:text-slate-100 text-sm">{{ $p->nama_jabatan ?? '-' }}
                                </p>
                                <a href="#"
                                    class="text-blue-600 hover:underline font-medium mt-0.5 block">{{ $p->nama_unit ?? '-' }}</a>
                            </td>
                            <td class="py-4 pr-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-{{ str_contains($p->nama_status, 'P3K') ? 'blue' : 'emerald' }}-50 text-{{ str_contains($p->nama_status, 'P3K') ? 'blue' : 'emerald' }}-700 font-bold px-2.5 py-1 rounded-full text-[11px]">
                                    <span
                                        class="w-1.5 h-1.5 rounded-full bg-{{ str_contains($p->nama_status, 'P3K') ? 'blue' : 'emerald' }}-500"></span>
                                    {{ $p->nama_status }}
                                </span>
                            </td>
                            <td class="py-4 pr-4">
                                <p class="text-sm"><span
                                        class="font-bold text-slate-900 dark:text-white">{{ $p->nama_golongan ?? '-' }}</span>
                                </p>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 font-medium">TMT:
                                    {{ $p->tmt_jabatan ? \Carbon\Carbon::parse($p->tmt_jabatan)->format('d M Y') : '-' }}</p>
                            </td>
                            <td class="py-4 pr-4 text-center">
                                <a href="/pegawai/{{ $p->id }}"
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/60 hover:text-blue-700 dark:hover:text-blue-300 transition-colors"
                                    title="Lihat Detail">
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
                            <td colspan="6" class="p-8 text-center text-slate-500 dark:text-slate-400">Belum ada data pegawai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 flex flex-col sm:flex-row justify-between items-center text-xs gap-4">
            <div class="flex items-center text-center sm:text-left gap-2 text-slate-500 dark:text-slate-400">
                <span>Menampilkan <strong>{{ $pegawais->firstItem() ?? 0 }} - {{ $pegawais->lastItem() ?? 0 }}</strong> dari
                    <strong>{{ $pegawais->total() }}</strong> Pegawai</span>
            </div>

            <div class="w-full sm:w-auto flex justify-center">
                {{ $pegawais->links() }}
            </div>
        </div>
    </div>

    <!-- Footer Alert -->

@endsection