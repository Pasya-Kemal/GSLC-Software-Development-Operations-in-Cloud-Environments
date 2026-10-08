# Hello World PHP dengan Docker

Tugas GSLC Software Development Operations in Cloud Environments: membuat aplikasi `index.php` yang menampilkan **Hello World!** dan menjalankannya di dalam Docker.

## Struktur proyek

```text
GSLC/
├── docker-compose.yml
├── src/
│   └── index.php
├── .gitignore
└── README.md
```

## Menjalankan aplikasi

Prasyarat: Docker Desktop sudah terpasang dan berjalan dengan Linux containers. PHP dan Apache disediakan oleh image Docker sehingga tidak perlu dipasang secara terpisah.

1. Clone repositori ini, lalu masuk ke folder hasil clone.
2. Jalankan perintah berikut dari folder yang berisi `docker-compose.yml`:

   ```sh
   docker compose up -d
   ```

3. Buka **http://localhost:8080** di browser. Halaman akan menampilkan **Hello World!**.

Saat pertama kali dijalankan, Docker mengunduh image `php:8.4-apache`; koneksi internet diperlukan.

## Memeriksa dan menghentikan aplikasi

```sh
# Validasi konfigurasi Compose
docker compose config

# Periksa status container
docker compose ps

# Periksa sintaks PHP di dalam container
docker compose exec web php -l /var/www/html/index.php

# Lihat log Apache
docker compose logs web

# Hentikan dan hapus container serta network proyek
docker compose down
```

Jika port 8080 sedang dipakai, ubah `127.0.0.1:8080:80` menjadi `127.0.0.1:8081:80`, jalankan kembali `docker compose up -d`, lalu buka http://localhost:8081.

## Penjelasan untuk presentasi

- **`src/index.php`** menyimpan pesan pada variabel PHP dan mencetaknya sebagai judul HTML. Apache menjalankan PHP di server sebelum hasil HTML dikirim ke browser.
- **Docker image** adalah paket lingkungan aplikasi. `php:8.4-apache` merupakan image resmi yang menyediakan PHP 8.4 dan Apache.
- **Container** adalah proses yang berjalan dari image tersebut. Service `web` menjalankan aplikasi di dalam container.
- **Docker Compose** membaca `docker-compose.yml` untuk mengatur image, port, dan folder aplikasi dalam satu perintah.
- **`127.0.0.1:8080:80`** menghubungkan port 8080 pada komputer lokal ke port 80 Apache di container. Aplikasi hanya dapat diakses dari komputer lokal.
- **`./src:/var/www/html:ro`** memasang folder `src` ke document root Apache sebagai bind mount read-only. Perubahan file lokal terlihat di container tanpa membangun ulang image; container tidak dapat menulis ke folder tersebut.
- **Tidak perlu Dockerfile tambahan** karena aplikasi ini menggunakan image PHP dan Apache yang sudah siap pakai.
- **`-d`** menjalankan container di background. `docker compose down` menghentikan dan menghapus container serta network proyek, sementara kode di folder `src` tetap ada.

## Referensi

- [Image resmi PHP](https://hub.docker.com/_/php)
- [Panduan Docker Compose](https://docs.docker.com/compose/gettingstarted/)

## Pengumpulan tugas

Pastikan repositori GitHub ini **Public**, lalu salin URL repositori ke balasan thread GSLC.

Contoh balasan (ganti bagian dalam kurung siku):

> Pak, berikut link repository tugas GSLC saya: [URL repository GitHub]. Aplikasi Hello World menggunakan PHP dan Docker Compose, dengan struktur `docker-compose.yml` serta `src/index.php`. Petunjuk menjalankan aplikasi tersedia di README. Terima kasih, Pak.
