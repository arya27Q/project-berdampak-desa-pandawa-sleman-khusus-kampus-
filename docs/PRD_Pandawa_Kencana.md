# Product Requirements Document (PRD): Web Profil & Katalog Pandawa Kencana

## 1. Problem Statement
**Siapa yang dirugikan:** 
Petani dan peternak yang mencari pupuk organik serta probiotik berkualitas tinggi namun kesulitan mendapatkan informasi produk, edukasi penggunaan, dan cara pemesanan yang mudah. Di sisi lain, pemilik bisnis (CV Pandawa Kencana) kesulitan mengelola katalog produk, artikel edukasi, dan pembaruan informasi secara dinamis tanpa bantuan *developer*.
**Kenapa:** 
Proses jual-beli sebelumnya banyak mengandalkan pemasaran konvensional (dari mulut ke mulut) atau platform yang tidak terintegrasi. Hal ini menyebabkan edukasi kurang maksimal dan operasional bisnis tidak terpusat.

## 2. Target User (Persona)
1. **Pak Marno (50 tahun) - Ketua Kelompok Tani:** Terbiasa menggunakan WhatsApp. Ingin melihat jenis pupuk organik, harganya, dan langsung memesan dengan cepat tanpa harus melalui proses *checkout/cart* yang rumit. Membutuhkan artikel edukasi tentang cara aplikasi pupuk yang benar.
2. **Admin Pandawa (25 tahun) - Staf Operasional:** Perlu memperbarui katalog produk, menambah artikel edukasi, dan mengganti nomor WhatsApp/headline web secara mandiri dengan cepat tanpa perlu menyentuh kode pemrograman.

## 3. Goals & Non-Goals
**Goals:**
- Menyediakan *landing page* yang profesional, memuat informasi perusahaan, katalog produk, dan artikel edukasi.
- Mengarahkan konversi pembelian langsung ke WhatsApp admin secara otomatis dengan *template* pesan.
- Menyediakan *Admin Panel (CMS)* sederhana untuk manajemen produk, artikel, dan pengaturan web dinamis.

**Non-Goals:**
- Bukan *e-commerce* penuh (tidak ada *shopping cart*, integrasi *payment gateway*, atau kalkulasi ongkos kirim otomatis).
- Tidak ada fitur manajemen inventaris (*stock management*) atau sistem kasir (*Point of Sales*).

## 4. User Stories
- **Sebagai** calon pembeli, **saya ingin** melihat daftar produk dan harganya di beranda, **supaya** saya bisa tahu apakah sesuai dengan budget saya.
- **Sebagai** calon pembeli, **saya ingin** mengklik tombol pesan dan langsung diarahkan ke WhatsApp, **supaya** saya tidak perlu mencatat nomor secara manual.
- **Sebagai** admin, **saya ingin** dapat menambah, mengubah, atau menghapus data produk dan artikel, **supaya** informasi di *landing page* selalu *up-to-date*.
- **Sebagai** admin, **saya ingin** bisa mengganti teks headline dan nomor WhatsApp kontak utama, **supaya** saya bisa beradaptasi jika ada promo atau pergantian nomor CS.

## 5. Daftar Fitur
**MVP (Telah Diimplementasikan):**
- *Landing Page* (Katalog produk, testimoni, FAQ, edukasi).
- Filter produk berdasarkan kategori (Semua, Pupuk, Probiotik, Terlaris, Populer).
- *Form to WhatsApp Lead* (Mengambil nama, produk, dan pesan, lalu *redirect* ke WA).
- *Admin Panel* (Login, Dashboard Statistik).
- CRUD (Create, Read, Update, Delete) Produk.
- CRUD Artikel Edukasi.
- *Web Settings* (Pengaturan dinamis Headline, Nomor WA, Alamat).

**v2 / Nanti:**
- Multi-admin / Role Management.
- Fitur pelacakan *leads* (pesan WA yang diklik).
- Sistem komentar pada artikel.

## 6. Functional Requirement Detail (Fitur MVP)
- **Katalog Landing Page:** Harus bisa memuat daftar produk maksimal 20 *item* dengan *badge* dan label harga. Saat diklik "Pesan", akan membuka modal pemesanan WhatsApp.
- **CRUD Produk (Admin):** Admin wajib bisa mengunggah foto produk, memberi nama, harga, deskripsi, tag/badge (Terlaris/Populer), dan kategori. 
- **Web Settings (Admin):** Harus menggunakan sistem *key-value* di database agar form headline dan kontak dapat tersimpan. Perubahan harus instan terefleksi di halaman depan.

## 7. Sketsa Data Model (Entitas Utama)
1. `users` -> `id, name, email, password`
2. `products` -> `id, name, category, price, desc, image_path, badge`
3. `articles` -> `id, title, excerpt, content, tag, image_path`
4. `settings` -> `id, key, value`

## 8. Edge Case & Failure State
- **Gambar Produk/Artikel Gagal Load:** Menggunakan *fallback image* atau *placeholder* (`picsum.photos` atau Unsplash).
- **Format Nomor WA Salah:** Jika admin menginput "0812...", sistem otomatis akan mengubah awalan "0" menjadi "62" agar link `wa.me` valid.
- **Database Kosong:** *Landing page* harus tetap aman diakses dan merender state "Belum ada produk/artikel".

## 9. Success Metrics
- Peningkatan jumlah klik (*lead*) ke WhatsApp sebesar 30% dari total *visitor*.
- Waktu yang dibutuhkan admin untuk memperbarui harga produk < 2 menit tanpa bantuan IT.

## 10. Open Questions
- Apakah kelak dibutuhkan fitur kalkulator dosis pupuk per hektar untuk petani di dalam web?
- Apakah *database leads* (nama pelanggan yang mengklik tombol WA) perlu disimpan ke database sebagai *database marketing*? *(Saat ini hanya sekadar pass-through ke WhatsApp).*
