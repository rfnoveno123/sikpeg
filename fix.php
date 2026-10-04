<?php
$content = file_get_contents('resources/views/welcome.blade.php');
$content = preg_replace('/\{\{ round\(\(\$golonganData\[\'(IV|III|II|I)\'\] \/ \{\{ \$totalPegawai \> 0 \? \$totalPegawai \: 1 \}\}\) \* 100\) \}\}/', '{{ $totalPegawai > 0 ? round(($golonganData[\'$1\'] / $totalPegawai) * 100) : 0 }}', $content);

// Also fix the SVG path that got ruined by 58 replacement
$content = str_replace('h.{{ $golonganData[\'I\'] }}2m15.356 2A8.001 8.001 0 004.{{ $golonganData[\'I\'] }}2 9m0 0H9m11 11v-5h-.{{ $golonganData[\'I\'] }}1', 'h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581', $content);

file_put_contents('resources/views/welcome.blade.php', $content);
echo "Fixed syntax error";
