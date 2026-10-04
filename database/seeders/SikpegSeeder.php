<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SikpegSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // 1. Seed Master Data
        $unitKerjas = [
            ['nama_unit' => 'Sekretariat Daerah', 'kode_unit' => 'SETDA'],
            ['nama_unit' => 'Dinas Kesehatan', 'kode_unit' => 'DINKES'],
            ['nama_unit' => 'Badan Perencanaan Pembangunan Daerah', 'kode_unit' => 'BAPPEDA'],
            ['nama_unit' => 'Dinas Pendidikan', 'kode_unit' => 'DISDIK'],
            ['nama_unit' => 'Inspektorat Daerah', 'kode_unit' => 'INSPEKTORAT'],
        ];
        DB::table('unit_kerja')->insert($unitKerjas);

        $jabatans = [
            ['nama_jabatan' => 'Kepala Dinas', 'jenis' => 'Struktural', 'eselon' => 'II.b'],
            ['nama_jabatan' => 'Sekretaris Dinas', 'jenis' => 'Struktural', 'eselon' => 'III.a'],
            ['nama_jabatan' => 'Kepala Bidang', 'jenis' => 'Struktural', 'eselon' => 'III.b'],
            ['nama_jabatan' => 'Analis Kebijakan Ahli Muda', 'jenis' => 'Fungsional', 'eselon' => null],
            ['nama_jabatan' => 'Pranata Komputer Ahli Pertama', 'jenis' => 'Fungsional', 'eselon' => null],
            ['nama_jabatan' => 'Pengadministrasi Umum', 'jenis' => 'Pelaksana', 'eselon' => null],
        ];
        DB::table('jabatan')->insert($jabatans);

        $golongans = [
            ['nama_golongan' => 'IV/c', 'pangkat' => 'Pembina Utama Muda'],
            ['nama_golongan' => 'IV/b', 'pangkat' => 'Pembina Tingkat I'],
            ['nama_golongan' => 'IV/a', 'pangkat' => 'Pembina'],
            ['nama_golongan' => 'III/d', 'pangkat' => 'Penata Tingkat I'],
            ['nama_golongan' => 'III/c', 'pangkat' => 'Penata'],
            ['nama_golongan' => 'III/b', 'pangkat' => 'Penata Muda Tingkat I'],
            ['nama_golongan' => 'III/a', 'pangkat' => 'Penata Muda'],
            ['nama_golongan' => 'II/c', 'pangkat' => 'Pengatur'],
        ];
        DB::table('golongan')->insert($golongans);

        $statuses = [
            ['nama_status' => 'PNS Aktif'],
            ['nama_status' => 'P3K Aktif'],
            ['nama_status' => 'CPNS'],
            ['nama_status' => 'Tugas Belajar'],
            ['nama_status' => 'Cuti Diluar Tanggungan Negara'],
        ];
        DB::table('status_pegawai')->insert($statuses);

        // 2. Seed 20 Pegawai
        $agamas = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        
        for ($i = 1; $i <= 20; $i++) {
            $isPns = $i <= 15; // 15 PNS, 5 P3K
            $tahunMasuk = $faker->numberBetween(2000, 2023);
            $bulanMasuk = str_pad($faker->numberBetween(1, 12), 2, '0', STR_PAD_LEFT);
            $tglLahir = $faker->dateTimeBetween('-50 years', '-25 years');
            $tahunLahir = $tglLahir->format('Y');
            $bulanLahir = $tglLahir->format('m');
            $tglLahirFormat = $tglLahir->format('d');
            
            // Format NIP PNS: TahunLahirBulanLahirTglLahir TahunDiangkatBulanDiangkat JenisKelamin(1/2) NoUrut(001)
            $jk = $faker->randomElement(['L', 'P']);
            $jkCode = $jk == 'L' ? '1' : '2';
            $nip = $tahunLahir . $bulanLahir . $tglLahirFormat . ' ' . $tahunMasuk . $bulanMasuk . ' ' . $jkCode . ' 00' . $faker->numberBetween(1, 9);
            
            if (!$isPns) {
                // P3K NIP format is similar but slightly different in reality, we'll just use a long number for simplicity
                $nip = '19' . $faker->numerify('################');
            }

            $pegawaiId = DB::table('pegawai')->insertGetId([
                'nip' => $nip,
                'nik' => $faker->nik,
                'nama_lengkap' => $faker->name($jk == 'L' ? 'male' : 'female'),
                'gelar_depan' => $faker->randomElement([null, 'Drs.', 'Ir.', 'Dr.']),
                'gelar_belakang' => $faker->randomElement(['S.Kom', 'S.E.', 'S.H.', 'M.Si', 'M.T.', null]),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $tglLahir->format('Y-m-d'),
                'jenis_kelamin' => $jk,
                'agama' => $faker->randomElement($agamas),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O', null]),
                
                'alamat_ktp' => $faker->address,
                'no_ponsel' => $faker->phoneNumber,
                'email_kedinasan' => $faker->userName . '@pemda.go.id',
                'email_pribadi' => $faker->email,
                
                'status_pegawai_id' => $isPns ? $faker->numberBetween(1, 3) : 2, // 2 is P3K
                
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Riwayat Jabatan (Active)
            DB::table('riwayat_jabatan')->insert([
                'pegawai_id' => $pegawaiId,
                'unit_kerja_id' => $faker->numberBetween(1, 5),
                'jabatan_id' => $faker->numberBetween(1, 6),
                'golongan_id' => $faker->numberBetween(1, 8),
                'tmt_jabatan' => Carbon::now()->subMonths($faker->numberBetween(1, 36))->format('Y-m-d'),
                'status_aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Riwayat Pendidikan
            DB::table('riwayat_pendidikan')->insert([
                'pegawai_id' => $pegawaiId,
                'tingkat' => 'S1',
                'nama_institusi' => 'Universitas ' . $faker->city,
                'jurusan' => 'Manajemen Informatika',
                'tahun_lulus' => $tahunMasuk - 1,
            ]);
        }
    }
}
