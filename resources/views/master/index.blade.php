@extends('layouts.app')

@section('content')
<div class="mb-4 text-sm text-slate-500 dark:text-slate-400 font-medium">
    <a href="/" class="hover:text-primary">Konfigurasi & Master</a> &rsaquo; <span class="text-primary font-semibold">Data {{ $title }}</span>
</div>

<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start mb-6 gap-4">
    <div>
        <h2 class="text-3xl font-bold text-slate-800 dark:text-slate-100 mb-1">Data {{ $title }}</h2>
        <p class="text-sm text-slate-500 dark:text-slate-400">Kelola master data {{ strtolower($title) }} untuk keperluan referensi sistem</p>
    </div>
    <div class="flex gap-2">
        <button class="bg-primary hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-2 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah {{ $title }}
        </button>
    </div>
</div>

<div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-900 text-[10px] uppercase tracking-wider text-slate-500 dark:text-slate-400 font-bold border-b border-slate-200 dark:border-slate-600">
                    <th class="p-4 w-12 text-center">No</th>
                    @foreach($columns as $col)
                        <th class="py-4 pr-4">{{ str_replace('_', ' ', $col) }}</th>
                    @endforeach
                    <th class="py-4 pr-4 text-center w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-xs divide-y divide-slate-100">
                @forelse($data as $index => $row)
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                    <td class="p-4 text-center font-medium text-slate-500">{{ $data->firstItem() + $index }}</td>
                    
                    @foreach($columns as $col)
                        <td class="py-4 pr-4 font-semibold text-slate-800 dark:text-slate-200">
                            {{ $row->$col }}
                        </td>
                    @endforeach
                    
                    <td class="py-4 pr-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button class="text-blue-600 hover:text-blue-800 p-1 transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                            <button class="text-rose-600 hover:text-rose-800 p-1 transition-colors" title="Hapus">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ count($columns) + 2 }}" class="p-8 text-center text-slate-500 dark:text-slate-400">Belum ada data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="p-4 border-t border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 flex flex-col sm:flex-row justify-between items-center text-xs gap-4">
        <div class="flex items-center text-center sm:text-left gap-2 text-slate-500 dark:text-slate-400">
            <span>Menampilkan <strong>{{ $data->firstItem() ?? 0 }} - {{ $data->lastItem() ?? 0 }}</strong> dari
                <strong>{{ $data->total() }}</strong> Baris</span>
        </div>

        <div class="w-full sm:w-auto flex justify-center">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
