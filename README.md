# Inspektorat Kabupaten Kediri

## Situs Web Resmi Inspektorat Kabupaten Kediri

Selamat datang di repositori resmi untuk situs web Inspektorat Kabupaten Kediri. Situs ini dirancang sebagai platform publik yang transparan, menyediakan informasi komprehensif dan layanan terkait Inspektorat Kabupaten Kediri.

## Fitur Utama

- Informasi Institusi: Gambaran menyeluruh mengenai visi, misi, tugas, fungsi, dan struktur organisasi Inspektorat Kabupaten Kediri.
- Berita Terkini: Pembaruan rutin seputar kegiatan, pencapaian, dan program kerja terbaru Inspektorat Kabupaten Kediri.
- Kegiatan Inspektorat: Dokumentasi kegiatan inspeksi, audit, investigasi, serta sosialisasi dan pelatihan yang dilakukan oleh Inspektorat Kabupaten Kediri.
- Profil Pimpinan: Pengenalan profil pejabat pimpinan Inspektorat Kabupaten Kediri, meliputi riwayat hidup, pengalaman kerja, dan kompetensi.
- Kontak: Informasi kontak lengkap Inspektorat Kabupaten Kediri, termasuk alamat kantor, nomor telepon, alamat surel, dan tautan ke media sosial resmi.
- Layanan Pendaftaran Konsultasi: Fitur pendaftaran daring bagi masyarakat dan instansi untuk berkonsultasi terkait pengawasan, pengaduan, dan layanan publik.

## Teknologi yang Digunakan

- Backend: PHP (CodeIgniter 4)
- Frontend: HTML, CSS (Bootstrap 5), JavaScript
- Basis Data: MySQL (XAMPP versi 7.4.33)

## Instalasi dan Pengaturan (Opsional)

1. Untuk pemakaian Lokal, install XAMPP versi 7.4.33, dan setelah install, buka file php.ini kemudian hapus tanda ";" pada baris extension=intl untuk mengaktifkan intl.
2. Kloning Repositori: git clone https://gitkominfo.kedirikab.go.id/pusintek_inspektorat/CMS-OPD
3. Instalasi Dependensi: composer install
4. Konfigurasi Basis Data: Ubah pengaturan koneksi basis data pada file app/Config/Database.php.
5. Bisa juga menggunakan env dengan mengubah nama file env menjadi .env, kemudian isi informasi database pada file tersebut.
5. Migrasi Basis Data: php spark migrate
6. Jalankan Server Lokal: php spark serve

## Disclaimer (Sanggahan)

Informasi yang disajikan pada situs ini bersifat umum dan dapat berubah sewaktu-waktu. Inspektorat Kabupaten Kediri tidak bertanggung jawab atas kerugian yang mungkin timbul akibat penggunaan informasi tersebut.

## Persyaratan Server

PHP versi 7.3, dengan ekstensi yang perlu diinstall:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) jika Anda berencana memakai HTTP\CURLRequest library

Sebagai tambahan, pastikan ekstensi berikut aktif di dalam PHP Anda:

- json (Aktif secara default - jangan dimatikan)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (Aktif secara default - jangan dimatikan)
