<?php
$content = file_get_contents('resources/views/pegawai/index.blade.php');

$startBody = strpos($content, '<tbody class="text-xs divide-y divide-slate-100">');
if ($startBody === false) $startBody = strpos($content, '<tbody');
$endBody = strpos($content, '</tbody>', $startBody) + 8;

$tbodyStr = <<<HTML
            <tbody class="text-xs divide-y divide-slate-100">
                @forelse(\$pegawais as \$p)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="p-4 text-center"><input type="checkbox" class="rounded border-slate-300 text-primary focus:ring-primary"></td>
                    <td class="py-4 pr-4">
                        <div class="flex items-start gap-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(\$p->nama_lengkap) }}&background=f1f5f9" alt="User" class="w-10 h-10 rounded-full object-cover">
                            <div>
                                <a href="/pegawai/{{ \$p->id }}" class="font-bold text-slate-900 text-sm hover:text-blue-600 transition-colors">{{ \$p->gelar_depan }} {{ \$p->nama_lengkap }}{{ \$p->gelar_belakang ? ', '.\$p->gelar_belakang : '' }}</a>
                                <p class="text-slate-500 font-medium flex items-center gap-1 mt-0.5"><svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg> {{ \$p->nip }}</p>
                                <p class="text-[11px] text-slate-500 mt-0.5">{{ \$p->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }} &bull; Usia {{ \Carbon\Carbon::parse(\$p->tanggal_lahir)->age }} th</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 pr-4">
                        <p class="font-bold text-slate-800 text-sm">{{ \$p->nama_jabatan ?? '-' }}</p>
                        <a href="#" class="text-blue-600 hover:underline font-medium mt-0.5 block">{{ \$p->nama_unit ?? '-' }}</a>
                    </td>
                    <td class="py-4 pr-4">
                        <span class="inline-flex items-center gap-1.5 bg-{{ str_contains(\$p->nama_status, 'P3K') ? 'blue' : 'emerald' }}-50 text-{{ str_contains(\$p->nama_status, 'P3K') ? 'blue' : 'emerald' }}-700 font-bold px-2.5 py-1 rounded-full text-[11px]">
                            <span class="w-1.5 h-1.5 rounded-full bg-{{ str_contains(\$p->nama_status, 'P3K') ? 'blue' : 'emerald' }}-500"></span> {{ \$p->nama_status }}
                        </span>
                    </td>
                    <td class="py-4 pr-4">
                        <p class="text-sm"><span class="font-bold text-slate-900">{{ \$p->nama_golongan ?? '-' }}</span></p>
                        <p class="text-[11px] text-slate-500 mt-1 font-medium">TMT: {{ \$p->tmt_jabatan ? \Carbon\Carbon::parse(\$p->tmt_jabatan)->format('d M Y') : '-' }}</p>
                    </td>
                    <td class="py-4 pr-4">
                        <a href="/pegawai/{{ \$p->id }}" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                            Detail <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-slate-500">Belum ada data pegawai.</td>
                </tr>
                @endforelse
            </tbody>
HTML;

$content = substr_replace($content, $tbodyStr, $startBody, $endBody - $startBody);

$startPag = strpos($content, '<!-- Pagination -->');
$endPag = strpos($content, '</div>', strpos($content, '</div>', strpos($content, '</div>', $startPag) + 1) + 1) + 6;

$pagStr = <<<HTML
    <!-- Pagination -->
    <div class="p-4 border-t border-slate-200 bg-white flex justify-between items-center text-xs">
        <div class="flex items-center gap-2 text-slate-500">
            <span>Menampilkan <strong>{{ \$pegawais->firstItem() ?? 0 }} - {{ \$pegawais->lastItem() ?? 0 }}</strong> dari <strong>{{ \$pegawais->total() }}</strong> Pegawai</span>
        </div>
        
        <div>
            {{ \$pegawais->links() }}
        </div>
    </div>
HTML;

$content = substr_replace($content, $pagStr, $startPag, $endPag - $startPag);
file_put_contents('resources/views/pegawai/index.blade.php', $content);
echo "Updated view index";
