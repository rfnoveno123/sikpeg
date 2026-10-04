<?php
$content = file_get_contents('resources/views/pegawai/show.blade.php');

$replacements = [
    'Drs. Agus Budiman, S.E., M.Si.' => '{{ $pegawai->gelar_depan }} {{ $pegawai->nama_lengkap }}{{ $pegawai->gelar_belakang ? ", " . $pegawai->gelar_belakang : "" }}',
    'NIP. 19750817 200312 1 004' => 'NIP. {{ $pegawai->nip }}',
    'Kepala Bidang Infrastruktur Jaringan' => '{{ $pegawai->nama_jabatan ?? "-" }}',
    'Dinas Komunikasi dan Informatika' => '{{ $pegawai->nama_unit ?? "-" }}',
    'IV/a' => '{{ $pegawai->nama_golongan ?? "-" }}',
    'Pembina' => '{{ $pegawai->pangkat ?? "-" }}',
    '17 Agustus 1975' => '{{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->translatedFormat("d F Y") }}',
    'Surabaya' => '{{ $pegawai->tempat_lahir }}',
    'Laki-Laki' => '{{ $pegawai->jenis_kelamin == "L" ? "Laki-laki" : "Perempuan" }}',
    'Islam' => '{{ $pegawai->agama }}',
    'Kawin' => '{{ $pegawai->status_perkawinan ?? "-" }}',
    'Agus Budiman' => '{{ $pegawai->nama_lengkap }}',
    'Jl. Pahlawan No. 45, Komplek Pemda, Surabaya' => '{{ $pegawai->alamat_ktp ?? "-" }}',
    '0812-3456-7890' => '{{ $pegawai->no_ponsel ?? "-" }}',
    'agus.budiman@pemda.go.id' => '{{ $pegawai->email_kedinasan ?? "-" }}',
    'PNS Aktif' => '{{ $pegawai->nama_status ?? "-" }}',
    'Struktural' => '{{ $pegawai->jenis_jabatan ?? "-" }}',
    'Eselon III.b' => 'Eselon {{ $pegawai->eselon ?? "-" }}',
    '01 Desember 2003' => '{{ $pegawai->tmt_pegawai ? \Carbon\Carbon::parse($pegawai->tmt_pegawai)->translatedFormat("d F Y") : "-" }}',
    '01 Januari 2023' => '{{ $pegawai->tmt_jabatan ? \Carbon\Carbon::parse($pegawai->tmt_jabatan)->translatedFormat("d F Y") : "-" }}',
    'https://ui-avatars.com/api/?name=Agus+Budiman&background=1a365d&color=fff&size=200' => 'https://ui-avatars.com/api/?name={{ urlencode($pegawai->nama_lengkap) }}&background=1a365d&color=fff&size=200',
    '21 Tahun 4 Bulan' => '{{ \Carbon\Carbon::parse($pegawai->tmt_pegawai)->diffInYears(now()) }} Tahun',
];

foreach ($replacements as $search => $replace) {
    $content = str_replace($search, $replace, $content);
}

file_put_contents('resources/views/pegawai/show.blade.php', $content);
echo "Updated show view";
