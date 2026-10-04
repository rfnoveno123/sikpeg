<?php
$dir = __DIR__ . '/database/migrations';
$files = scandir($dir);

$replacements = [
    'create_unit_kerjas_table' => "\$table->string('nama_unit');\n            \$table->string('kode_unit')->nullable();\n            \$table->foreignId('parent_id')->nullable();",
    'create_jabatans_table' => "\$table->string('nama_jabatan');\n            \$table->string('jenis')->nullable();\n            \$table->string('eselon')->nullable();",
    'create_golongans_table' => "\$table->string('nama_golongan');\n            \$table->string('pangkat')->nullable();",
    'create_status_pegawais_table' => "\$table->string('nama_status');",
    'create_pegawais_table' => "\$table->foreignId('user_id')->nullable();\n            \$table->string('nip')->unique();\n            \$table->string('nik')->unique();\n            \$table->string('nama_lengkap');\n            \$table->string('gelar_depan')->nullable();\n            \$table->string('gelar_belakang')->nullable();\n            \$table->string('tempat_lahir');\n            \$table->date('tanggal_lahir');\n            \$table->enum('jenis_kelamin', ['L', 'P']);\n            \$table->string('agama');\n            \$table->string('status_perkawinan')->nullable();\n            \$table->string('golongan_darah')->nullable();\n            \$table->string('no_karpeg')->nullable();\n            \$table->string('no_taspen')->nullable();\n            \$table->text('alamat_ktp')->nullable();\n            \$table->string('no_ponsel')->nullable();\n            \$table->string('email_kedinasan')->nullable();\n            \$table->string('email_pribadi')->nullable();\n            \$table->string('kontak_darurat')->nullable();\n            \$table->foreignId('status_pegawai_id')->constrained('status_pegawais');"
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
