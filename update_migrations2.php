<?php
$dir = __DIR__ . '/database/migrations';
$files = scandir($dir);

$replacements = [
    'create_riwayat_jabatans_table' => "\$table->foreignId('pegawai_id')->constrained('pegawais');\n            \$table->foreignId('jabatan_id')->constrained('jabatans');\n            \$table->foreignId('unit_kerja_id')->constrained('unit_kerjas');\n            \$table->foreignId('golongan_id')->constrained('golongans');\n            \$table->date('tmt_jabatan');\n            \$table->boolean('status_aktif')->default(true);",
    'create_riwayat_pendidikans_table' => "\$table->foreignId('pegawai_id')->constrained('pegawais');\n            \$table->string('tingkat');\n            \$table->string('nama_institusi');\n            \$table->string('jurusan');\n            \$table->string('tahun_lulus');",
    'create_data_keluargas_table' => "\$table->foreignId('pegawai_id')->constrained('pegawais');\n            \$table->string('nama');\n            \$table->string('hubungan');\n            \$table->boolean('status_tunjangan')->default(false);",
    'create_dokumen_pegawais_table' => "\$table->foreignId('pegawai_id')->constrained('pegawais');\n            \$table->string('jenis_dokumen');\n            \$table->string('file_path');\n            \$table->boolean('status_verifikasi')->default(false);"
];

foreach ($files as $file) {
    foreach ($replacements as $key => $schema) {
        if (strpos($file, $key) !== false) {
            $path = $dir . '/' . $file;
            $content = file_get_contents($path);
            $content = preg_replace('/\$table->id\(\);\s*\$table->timestamps\(\);/', "\$table->id();\n            " . $schema . "\n            \$table->timestamps();", $content);
            file_put_contents($path, $content);
            echo "Updated $file\n";
        }
    }
}
