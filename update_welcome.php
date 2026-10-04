<?php
$content = file_get_contents('resources/views/welcome.blade.php');

// Simple string replacements for stat cards
$replacements = [
    '1,428' => '{{ number_format($totalPegawai) }}',
    '1,045' => '{{ number_format($pnsCount) }}',
    '73.2% dari kuota aparatur' => '{{ $totalPegawai > 0 ? round(($pnsCount / $totalPegawai) * 100, 1) : 0 }}% dari total pegawai',
    '383' => '{{ number_format($pppkCount) }}',
    '26.8% formasi aktif' => '{{ $totalPegawai > 0 ? round(($pppkCount / $totalPegawai) * 100, 1) : 0 }}% dari total pegawai',
    '18' => '{{ $bupCount }}',
];

foreach ($replacements as $search => $replace) {
    // Only replace first occurrence to avoid messing up other parts if any overlap
    $pos = strpos($content, $search);
    if ($pos !== false) {
        $content = substr_replace($content, $replace, $pos, strlen($search));
    }
}

// Replace Golongan percentages
$totalGol = '{{ $totalPegawai > 0 ? $totalPegawai : 1 }}';
$golonganReplacements = [
    'style="width: 18%"' => 'style="width: {{ round(($golonganData[\'IV\'] / ' . $totalGol . ') * 100) }}%"',
    'style="width: 52%"' => 'style="width: {{ round(($golonganData[\'III\'] / ' . $totalGol . ') * 100) }}%"',
    'style="width: 26%"' => 'style="width: {{ round(($golonganData[\'II\'] / ' . $totalGol . ') * 100) }}%"',
    'style="width: 4%"'  => 'style="width: {{ round(($golonganData[\'I\'] / ' . $totalGol . ') * 100) }}%"',
    
    '<span class="text-xs font-bold text-white px-3">18%</span>' => '<span class="text-xs font-bold text-white px-3">{{ round(($golonganData[\'IV\'] / ' . $totalGol . ') * 100) }}%</span>',
    '<span class="text-xs font-bold text-white px-3">52%</span>' => '<span class="text-xs font-bold text-white px-3">{{ round(($golonganData[\'III\'] / ' . $totalGol . ') * 100) }}%</span>',
    '<span class="text-xs font-bold text-white px-3">26%</span>' => '<span class="text-xs font-bold text-white px-3">{{ round(($golonganData[\'II\'] / ' . $totalGol . ') * 100) }}%</span>',
    '<span class="text-xs font-bold text-white px-3">4%</span>'  => '<span class="text-xs font-bold text-white px-3">{{ round(($golonganData[\'I\'] / ' . $totalGol . ') * 100) }}%</span>',
    
    '257' => '{{ $golonganData[\'IV\'] }}',
    '742' => '{{ $golonganData[\'III\'] }}',
    '371' => '{{ $golonganData[\'II\'] }}',
    '58'  => '{{ $golonganData[\'I\'] }}',
    
    'Pembina / Utama (18%)' => 'Pembina / Utama ({{ round(($golonganData[\'IV\'] / ' . $totalGol . ') * 100) }}%)',
    'Penata / Muda (52%)'   => 'Penata / Muda ({{ round(($golonganData[\'III\'] / ' . $totalGol . ') * 100) }}%)',
    'Pengatur (26%)'        => 'Pengatur ({{ round(($golonganData[\'II\'] / ' . $totalGol . ') * 100) }}%)',
    'Juru (4%)'             => 'Juru ({{ round(($golonganData[\'I\'] / ' . $totalGol . ') * 100) }}%)',
];

foreach ($golonganReplacements as $search => $replace) {
    $content = str_replace($search, $replace, $content);
}

// Replace Unit Kerja (dynamic loop)
$startUK = strpos($content, '<div class="space-y-4">');
if ($startUK !== false) {
    $endUK = strpos($content, '</div>', strpos($content, '</div>', strpos($content, '</div>', strpos($content, '</div>', strpos($content, '</div>', $startUK) + 1) + 1) + 1) + 1) + 6;
    
    $ukStr = <<<HTML
<div class="space-y-4">
    @forelse(\$unitKerjaStats as \$index => \$uk)
    <div class="flex items-center justify-between group">
        <div class="flex items-center gap-3">
            <span class="text-slate-400 font-bold text-xs w-4">{{ \$index + 1 }}</span>
            <p class="text-sm font-bold text-slate-800 group-hover:text-primary transition-colors">{{ \$uk->nama_unit }}</p>
        </div>
        <p class="text-xs font-bold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md">{{ \$uk->total }} Pegawai</p>
    </div>
    @empty
    <p class="text-sm text-slate-500">Belum ada data unit kerja.</p>
    @endforelse
</div>
HTML;
    $content = substr_replace($content, $ukStr, $startUK, $endUK - $startUK);
}

// Replace Mutasi table (dynamic loop)
$startTable = strpos($content, '<tbody class="text-xs divide-y divide-slate-100">');
if ($startTable !== false) {
    $endTable = strpos($content, '</tbody>', $startTable) + 8;
    
    $tableStr = <<<HTML
<tbody class="text-xs divide-y divide-slate-100">
    @forelse(\$recentMutasi as \$m)
    <tr class="hover:bg-slate-50/50 transition-colors">
        <td class="p-4">
            <div class="flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(\$m->nama_lengkap) }}&background=f1f5f9" alt="User" class="w-8 h-8 rounded-full">
                <div>
                    <a href="/pegawai/{{ \$m->id }}" class="font-bold text-slate-800 hover:text-blue-600">{{ \$m->gelar_depan }} {{ \$m->nama_lengkap }}{{ \$m->gelar_belakang ? ', '.\$m->gelar_belakang : '' }}</a>
                    <p class="text-[11px] text-slate-500 font-medium">{{ \$m->nip }}</p>
                </div>
            </div>
        </td>
        <td class="p-4">
            <p class="font-semibold text-slate-800">{{ \$m->nama_unit }}</p>
        </td>
        <td class="p-4 font-semibold text-slate-800">{{ \$m->nama_jabatan }}</td>
        <td class="p-4"><span class="bg-slate-100 text-slate-600 font-bold px-2.5 py-1 rounded">{{ \$m->nama_golongan }}</span></td>
        <td class="p-4"><p class="text-slate-800">{{ \Carbon\Carbon::parse(\$m->tmt_jabatan)->format('d M') }}</p><p class="text-slate-500">{{ \Carbon\Carbon::parse(\$m->tmt_jabatan)->format('Y') }}</p></td>
        <td class="p-4"><span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded">Update Data</span></td>
        <td class="p-4 text-center">
            <a href="/pegawai/{{ \$m->id }}" class="inline-block text-blue-600 hover:bg-blue-50 p-1.5 rounded transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </a>
        </td>
    </tr>
    @empty
    <tr><td colspan="7" class="p-8 text-center text-slate-500">Belum ada pembaruan data.</td></tr>
    @endforelse
</tbody>
HTML;
    $content = substr_replace($content, $tableStr, $startTable, $endTable - $startTable);
}

// Replace showing pagination text in dashboard mutasi
$content = preg_replace(
    '/<span class="text-slate-500">Menampilkan <strong>1 - 3<\/strong> dari <strong>128<\/strong> entri mutasi tahun 2025<\/span>/', 
    '<span class="text-slate-500">Menampilkan <strong>{{ count($recentMutasi) }}</strong> pembaruan data terakhir</span>', 
    $content
);

file_put_contents('resources/views/welcome.blade.php', $content);
echo "Updated welcome view";
