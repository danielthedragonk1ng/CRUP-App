# CRUD-App

Repository ini adalah aplikasi CRUD sederhana berbasis Laravel yang dikembangkan untuk lingkungan development lokal (Windows + XAMPP). README ini menjelaskan langkah-langkah setup agar aplikasi bisa dijalankan di mesin pengembang.

## Prasyarat
- PHP 8.x terinstal (disarankan lewat XAMPP)
- Composer
- Node.js + npm
- SQLite (file database sudah disertakan di `database/database.sqlite`)
- Git (opsional)

> Catatan: Instruksi di bawah disusun untuk PowerShell di Windows.

## Langkah-langkah setup

1. Clone repository (jika belum):

   git clone <repo-url> .

2. Install dependensi PHP dengan Composer:

   composer install

3. Install dependensi frontend:

   npm install

4. Copy file environment dan generate APP_KEY:

   cp .env.example .env ; php artisan key:generate

   Jika Anda menggunakan PowerShell dan `cp` tidak tersedia, gunakan:

   Copy-Item .env.example .env ; php artisan key:generate

5. Database (SQLite)

   - File SQLite contoh sudah ada di `database/database.sqlite`. Jika tidak ada, buat file kosong:

     New-Item -Path .\database\database.sqlite -ItemType File

   - Pastikan di file `.env` pengaturan database mengarah ke SQLite:

     DB_CONNECTION=sqlite
     DB_DATABASE=${PWD}\database\database.sqlite

   - Jalankan migrasi dan seeders:

     php artisan migrate --seed

     Jika ada perubahan migration tambahan, jalankan:

     php artisan migrate

6. Build assets (development):

   npm run dev

   Untuk production build:

   npm run build

7. Menjalankan aplikasi

   - Opsi A (php artisan serve):

     php artisan serve

     Akses: http://127.0.0.1:8000

   - Opsi B (XAMPP):

     - Tempatkan project di folder `htdocs` (sudah pada `c:\xampp\htdocs\crud-app`).
     - Pastikan Apache berjalan.
     - Akses lewat http://localhost/crud-app/public (atau atur VirtualHost untuk root project).

## Troubleshooting cepat

- Jika muncul error Missing app key: jalankan `php artisan key:generate`.
- Jika view 500/parse error: cek `routes/web.php` untuk error sintaks.
- Jika migration tidak menambahkan kolom yang diharapkan: periksa file `database/database.sqlite` yang aktif, dan jalankan `php artisan migrate:status`.
- Cek log aplikasi di `storage/logs/laravel.log` untuk detail error runtime.

## Perintah berguna

- Lihat routes: `php artisan route:list`
- Clear cache config: `php artisan config:clear`
- Clear view cache: `php artisan view:clear`
- Jalankan tinker: `php artisan tinker`

## Catatan singkat proyek

- Model `Dosen` menggunakan field `nama` dan `email`.
- Model `MataKuliah` menggunakan field `nama`, `sks`, dan `dosen_id`.

Jika Anda menemukan MassAssignmentException saat menyimpan model, periksa properti `$fillable` pada model terkait (mis. `app/Models/MataKuliah.php`).

---

README ini sekarang hanya berisi instruksi setup singkat untuk project — bagian dokumentasi/branding Laravel standar telah dihapus agar lebih ringkas dan fokus pada langkah menjalankan aplikasi.
