# Aplikasi SPP Codeigniter 4

Aplikasi ini dibuat untuk Uji Kompetensi Keahlian Rekayasa Perangkat Lunak di SMKN 2 Kuningan. Dengan bimbingan dari Bapa Oya Suryana M.Kom. https://github.com/oyasuryana Selaku guru saya di SMK akhinya aplikasi ini dapat dibuat dan diselesaikan sesuai dengan dengan keinginan. Adapun jika dalam aplikasi ini terdapat bug, atau kekurangan mungkin itu semua terjadi atas kurang nya ilmu yang saya pelajari.

## Instalasi

1.  Intalasi pada online hosting.
    1. Upload source code ke hosting anda.
    2. Pindahkan file file yang ada pada folder public ke public_html hosting anda.
    3. Buka file index.php dan lakukan konfigurasi ulang. 
    4. Ubah file env jadi .env
    5. Konfigurasi nama database di file .env
    6. Migrasi database ke server jalankan php spark migrate
    7. Jalankan php spark db:seeder lalu ketik UserSeeder
    8. Testing.
2.  Intalasi pada localhost.
    1. Silahkan unduh source code dan ekstrak source code nya.
    2. Ubah file env jadi .env
    3. Konfigurasi nama database di file .env
    4. Jalankan cmd, lalu arahkan ke direktori aplikasi-spp ketik php spark migrate
    5. Ketikan php spark db:seeder lalu ketik UserSeeder.
    6. Ketik php spark migrate, dan buka almat url http://localhost:port pada browser.
    7. Testing.

## Penggunaan

1. Login sebagai siswa
   - username : nis
   - password : secara default password nya adalah nis
2. Login sebagai petugas
   - username : email
   - password : secara default password nya adalah(123456)
3. Login sebagai admin
   - username : admin@gmail.com
   - password : secara default password nya adalah(admin)

## Kebutuhan server

PHP versi 7.4 atau versi terbaru.
