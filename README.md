# Sistem Administrasi RW Online (CodeIgniter 3 + AdminLTE)

Aplikasi manajemen administrasi RW yang memudahkan warga dalam pengurusan surat, penyampaian pengaduan, dan mendapatkan informasi terbaru.

## Fitur Utama

### Admin
- Dashboard Statistik (Total Warga, Surat, Pengaduan, Berita).
- Manajemen Data Warga (CRUD + Auto account creation).
- Manajemen Berita & Kegiatan (CRUD + Thumbnail + CKEditor).
- Manajemen Pengajuan Surat (Verifikasi + Upload PDF Hasil).
- Manajemen Pengaduan (Tanggapan + Update Status).
- Manajemen User & Sistem.

### Warga
- Login menggunakan NIK.
- Dashboard Ringkasan.
- Pengajuan Surat (Mandiri).
- Monitoring Status Surat & Download PDF.
- Pengaduan Warga Online.
- Edit Profil & Ganti Password.

### Public
- Landing Page Modern (Bootstrap 5).
- Portal Berita & Pengumuman.
- Informasi Kontak & Form Pesan.

## Teknologi
- PHP 7.4+ / PHP 8.x
- Framework CodeIgniter 3
- Database MySQL
- Template AdminLTE 3
- UI Public Bootstrap 5
- SweetAlert2, DataTables, CKEditor

## Instalasi

1. **Clone atau Download** source code ini ke folder server Anda (contoh: `C:/laragon/www/sistem-rw`).
2. **Buat Database** baru di MySQL dengan nama `sistem_rw`.
3. **Import SQL** file `database.sql` ke database `sistem_rw`.
4. **Konfigurasi Base URL** di `application/config/config.php`:
   ```php
   $config['base_url'] = 'http://localhost/sistem-rw/';
   ```
5. **Konfigurasi Database** di `application/config/database.php`:
   ```php
   'hostname' => 'localhost',
   'username' => 'root',
   'password' => '',
   'database' => 'sistem_rw',
   ```
6. **Akses Aplikasi** melalui browser di `http://localhost/sistem-rw`.

## Akun Default

**Admin:**
- Username: `admin`
- Password: `admin123`

**Warga (Contoh jika sudah diinput):**
- Username: `[NIK]`
- Password: `warga123`

---
*Dibuat untuk memodernisasi administrasi lingkungan RW.*
