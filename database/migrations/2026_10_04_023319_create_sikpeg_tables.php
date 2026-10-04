<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit');
            $table->string('kode_unit')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan');
            $table->string('jenis')->nullable(); // Struktural/Fungsional/Pelaksana
            $table->string('eselon')->nullable();
            $table->timestamps();
        });

        Schema::create('golongan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_golongan');
            $table->string('pangkat')->nullable();
            $table->timestamps();
        });

        Schema::create('status_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_status');
            $table->timestamps();
        });

        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('nip')->unique();
            $table->string('nik')->unique();
            $table->string('nama_lengkap');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->string('status_perkawinan')->nullable();
            $table->string('golongan_darah')->nullable();
            
            $table->text('alamat_ktp')->nullable();
            $table->string('no_ponsel')->nullable();
            $table->string('email_kedinasan')->nullable();
            $table->string('email_pribadi')->nullable();
            $table->string('kontak_darurat')->nullable();
            
            $table->foreignId('status_pegawai_id')->nullable()->constrained('status_pegawai');
            $table->string('no_karpeg')->nullable();
            $table->string('no_taspen')->nullable();
            $table->timestamps();
        });

        Schema::create('riwayat_jabatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->foreignId('jabatan_id')->constrained('jabatan');
            $table->foreignId('unit_kerja_id')->constrained('unit_kerja');
            $table->foreignId('golongan_id')->constrained('golongan');
            $table->date('tmt_jabatan');
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });

        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->string('tingkat');
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->string('tahun_lulus');
            $table->timestamps();
        });

        Schema::create('data_keluarga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->string('nama');
            $table->string('hubungan');
            $table->boolean('status_tunjangan')->default(false);
            $table->timestamps();
        });

        Schema::create('dokumen_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->string('jenis_dokumen');
            $table->string('file_path');
            $table->boolean('status_verifikasi')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen_pegawai');
        Schema::dropIfExists('data_keluarga');
        Schema::dropIfExists('riwayat_pendidikan');
        Schema::dropIfExists('riwayat_jabatan');
        Schema::dropIfExists('pegawai');
        Schema::dropIfExists('status_pegawai');
        Schema::dropIfExists('golongan');
        Schema::dropIfExists('jabatan');
        Schema::dropIfExists('unit_kerja');
        Schema::dropIfExists('users');
    }
};
