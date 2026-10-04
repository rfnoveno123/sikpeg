# SIKPEG ENTERPRISE
**Sistem Informasi Manajemen Kepegawaian**

SIKPEG Enterprise adalah aplikasi manajemen data kepegawaian modern yang dikembangkan dengan Laravel 11. Aplikasi ini difokuskan untuk mengelola master data instansi dan profil lengkap ASN/Pegawai. Dibangun dengan antarmuka yang modern, responsif, dan didukung fitur *Dark Mode* terintegrasi.

---

## 🏗️ Struktur Database & Tabel

Sistem ini memiliki tabel-tabel terelasi yang berfungsi menopang seluruh operasi data master dan manajemen pegawai:

### Tabel Inti (Autentikasi & Pengguna)
- **`users`**: Digunakan untuk autentikasi sistem. Kolom utama: `id`, `username`, `email`, `password`. Digunakan khusus untuk mengamankan portal via form *login*.

### Tabel Master Data
Master data merupakan pondasi referensi data kepegawaian yang diatur pada menu "Konfigurasi & Master":
- **`unit_kerja`**: Menyimpan referensi Organisasi Perangkat Daerah (OPD), instansi, atau divisi (Kolom: `nama_unit`, `kode_unit`, `parent_id`).
- **`jabatan`**: Menyimpan referensi nama jabatan, baik struktural maupun fungsional beserta eselonnya (Kolom: `nama_jabatan`, `jenis`, `eselon`).
- **`golongan`**: Menyimpan referensi pangkat dan ruang golongan (Kolom: `nama_golongan`, `pangkat`).
- **`status_pegawai`**: Menyimpan referensi ikatan kerja (misal: PNS, CPNS, PPPK, Honorer) (Kolom: `nama_status`).

### Tabel Inti (Manajemen Pegawai)
- **`pegawai`**: Tabel *core* yang menyimpan biodata dan informasi utama seorang pegawai. Memiliki relasi ke `users` dan `status_pegawai`. (Kolom: `nip`, `nik`, `nama_lengkap`, biodata lahir, kotak, info kontak darurat, karpeg/taspen, dll).
- **`riwayat_jabatan`**: Melacak pergerakan mutasi/promosi pegawai. Merelasikan `pegawai` dengan `jabatan`, `unit_kerja`, dan `golongan`.
- **`riwayat_pendidikan`**: Menyimpan sejarah akademis pegawai (Kolom: tingkat pendidikan, institusi, jurusan, tahun kelulusan).
- **`data_keluarga`**: Mencatat informasi tanggungan/keluarga pegawai untuk keperluan tunjangan dan BPJS.
- **`dokumen_pegawai`**: Tabel relasi untuk menyimpan rujukan _file/path_ dokumen digital hasil unggahan (*scan* SK, KTP, dll).

---

## 🗂️ Struktur Menu & Navigasi Aplikasi

Aplikasi memiliki Sidebar interaktif (yang juga ramah-seluler) dengan menu-menu sebagai berikut:

1. **Beranda / Dashboard**
   Menampilkan ringkasan, metrik jumlah pegawai, status sistem, dan grafik analitik standar.

2. **Data Pegawai**
   Menu operasional utama (`/pegawai`) tempat *Human Resource* melihat direktori pegawai, menambah pegawai baru, serta masuk ke profil 360° yang mencakup identitas, riwayat jabatan, dll.

3. **Konfigurasi & Master**
   Modul administratif yang terdiri atas sub-menu *dropdown* untuk manajemen referensi (CRUD operasional):
   - **Unit Kerja** (`/master/unit-kerja`)
   - **Jabatan** (`/master/jabatan`)
   - **Status Pegawai** (`/master/status-pegawai`)
   - **Golongan** (`/master/golongan`)

4. **Autentikasi (Top Bar / Mobile)**
   - Mendukung integrasi *Dark Mode* dengan *localStorage*.
   - Menu profil (*Logout* dengan pentalan halaman/loading *splash screen*).

---

## 📁 Struktur Folder Utama Proyek

Proyek ini dibangun berdasarkan standarisasi *MVC* milik Laravel, dengan beberapa penyesuaian:

```text
c:\laragon\www\sikpeg\
├── app/
│   ├── Http/
│   │   └── Controllers/     -> Memuat logika bisnis (AuthController, PegawaiController, MasterDataController, dll).
│   └── Models/              -> Representasi tabel di database (User, Pegawai, Jabatan, dll) dengan definisi relasi Eloquent.
│
├── database/
│   ├── migrations/          -> Skrip versi database (ex: create_sikpeg_tables, alter_users_table).
│   └── seeders/             -> Skrip penyuntik data awal (SikpegSeeder untuk Dummy data Master & Pegawai).
│
├── public/                  -> Tempat meletakkan aset publik yang di-serve (walau mayoritas UI menggunakan CDN Tailwind).
│
├── resources/
│   ├── css/ & js/           -> Source aset front-end (biasanya dirajut oleh Vite).
│   └── views/               -> Sentral *Front-End* (Blade Templates).
│       ├── auth/            -> Tampilan login.blade.php khusus (Enterprise Split-Screen UI).
│       ├── layouts/         -> Berisi app.blade.php (Template cangkang yang membungkus Header, Sidebar, Footer, Dark Mode logic, dan HTMX logic).
│       ├── master/          -> Tampilan untuk operasi CRUD tabel referensi.
│       └── pegawai/         -> Tampilan operasi manajemen Data Pegawai (index, show, create, edit).
│
├── routes/
│   └── web.php              -> Definisi rute aplikasi web, penerapan *middleware auth*, rute login, dan RESTful Resource routes.
│
├── .env                     -> Konfigurasi *environment* khusus (DB Laragon, nama App, koneksi dsb).
└── package.json / composer.json -> Manajemen *dependencies* ekosistem PHP dan Node.
```

---

## 🚀 Fitur Unggulan Antarmuka (UI/UX)
- **Tema Bebas Gangguan**: Menggunakan skema desain Tailwind yang kustom dengan *Dark Mode* elegan tanpa distorsi, dan menyimpan rekam jejak tema menggunakan memori sesi lokal.
- **Transisi HTMX / SPA-like**: Aplikasi merender navigasi antar halaman tanpa *reload* secara buta, memberikan rasa aplikasi modern (*Single Page Application*) lewat sematan HTMX (`hx-boost`).
- **Autentikasi Presisi**: Halaman Login berfokus murni pada utilitas *username* dan *password* yang disederhanakan tanpa embel-embel informasi eksternal opsional yang tidak diperlukan.
