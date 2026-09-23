# UI/UX Design Brief: Pandawa Kencana Multi Farm

## 1. Design Principles
1. **Clean & Trustworthy:** Menggunakan ruang putih (*white space*) yang luas dan elemen yang tidak berantakan untuk membangun rasa percaya. Produk agrikultur harus terkesan higienis dan profesional.
2. **Clear Call-to-Action (CTA):** Tombol pemesanan harus langsung terlihat, kontras, dan frictionless (satu klik ke WhatsApp).
3. **Familiarity (Mudah Digunakan):** Petani dan pengguna usia lanjut lebih terbiasa dengan pola navigasi standar. Hindari UI eksperimental; gunakan form konvensional dan navigasi atas yang jelas.

## 2. Visual Direction
- **Mood:** Alami, segar, profesional, membumi (*down-to-earth*).
- **Referensi Estetika:** *Modern Agriculture Tech*, aplikasi *green-eco*.
- **Yang dihindari:** Warna *neon* mencolok, font yang sulit dibaca (seperti script font), animasi yang terlalu lambat atau mengganggu fokus.

## 3. Design Tokens
- **Primary Colors:** 
  - `Moss Green` (Hijau Tua, #166534) untuk teks utama dan tombol *primary*.
  - `Sprout Green` (Hijau Muda, #86EFAC) untuk aksen dan *hover state*.
- **Neutral Colors:** 
  - `Cream/Sand` (Krem, #FDFBF7 / #F4F1EA) sebagai latar belakang utama yang lebih hangat dibanding putih bersih (mengurangi *eye strain*).
  - `Bark` (Cokelat Tua / Abu-abu gelap, #3F3F46) untuk paragraf teks.
- **Typography:**
  - `Font Display` (Heading): Serif modern atau Sans-Serif tebal yang elegan (Misal: *Playfair Display* atau *Inter* bold).
  - `Font Body`: *Inter* atau *Roboto* untuk keterbacaan tinggi di ukuran kecil.
- **Border Radius:** `rounded-2xl` atau `rounded-3xl` (16px - 24px) untuk kesan organik dan tidak kaku (mirip lekukan daun/batu).
- **Shadow:** Lembut, tebal, dan *diffused* (misal: *soft drop-shadow* dengan warna *moss* atau *bark* 10% opacity).

## 4. Screen Inventory
1. **Landing Page:** Halaman depan tempat konversi terjadi (Katalog, Artikel, Edukasi, Testimoni).
2. **Admin - Login:** Form masuk khusus pengelola.
3. **Admin - Dashboard:** Ringkasan statistik (jumlah produk, jumlah kunjungan, artikel terbaru).
4. **Admin - Produk (Index/Create/Edit):** Tabel manajemen inventaris produk.
5. **Admin - Artikel (Index/Create/Edit):** Editor konten blog/edukasi.
6. **Admin - Pengaturan Web:** Form *key-value* untuk mengubah Headline, WA, dan Alamat.

## 5. User Flow (Journey Utama: Pemesanan)
1. Pengguna masuk ke *Landing Page*.
2. Melakukan *scroll* hingga bagian Katalog Produk.
3. Menggunakan filter "Pupuk Organik".
4. Mengklik tombol "Pesan via WhatsApp" pada produk pilihan.
5. Muncul *Modal Form* meminta Nama & Nomor HP (sebagai lead).
6. Pengguna mengisi data dan klik "Lanjutkan ke WhatsApp".
7. Aplikasi otomatis membuka tab WhatsApp dengan teks otomatis ("Halo Pandawa...").

## 6. Layout per Screen (Contoh: Landing Page)
- **Header:** Sticky *navbar* dengan Logo di kiri, Navigasi di tengah (disembunyikan di *mobile*), dan CTA "Pesan Sekarang" di kanan.
- **Hero Section:** Gambar lahan/pertanian *full-width* dengan *overlay* teks di sebelah kiri, menjelaskan *value proposition* utama.
- **Catalog Section:** Judul di tengah, disusul tombol filter berbentuk *pills*, lalu Grid Produk (1 kolom di *mobile*, 3 kolom di *desktop*).
- **Footer:** Berlatar belakang gelap (`Bark`), memuat informasi kontak lengkap dan alamat.

## 7. Component Library
- **Button (Primary):** `bg-moss text-cream rounded-full px-5 py-2.5 font-semibold hover:bg-leaf`.
- **Button (Secondary/Filter):** `bg-cream text-bark border border-leaf/25 rounded-full hover:border-leaf`.
- **Card (Product/Article):** `bg-cream rounded-2xl border border-leaf/10 overflow-hidden shadow-sm hover:shadow-lg`.
- **Badge:** `bg-sprout/20 text-moss rounded-full px-3 py-1 text-xs font-bold uppercase`.

## 8. State
- **Empty State (Katalog):** "Belum ada produk dalam kategori ini." dengan ilustrasi daun abu-abu sederhana.
- **Loading State:** Tombol CTA berubah teks menjadi "Menyimpan..." atau *spinner* saat data dikirim (mencegah *double submit*).
- **Error State:** Border input menjadi merah, pesan error di bawah input ("Kolom ini wajib diisi").

## 9. Responsive Behaviour
- **Mobile (< 768px):** Menu atas disembunyikan dan diganti dengan *Hamburger menu*. Katalog menjadi 1 kolom yang bisa di-*scroll* secara vertikal (atau *swipe horizontal*).
- **Tablet (768px - 1024px):** Katalog 2 kolom.
- **Desktop (> 1024px):** Layout statis maksimum 1152px (max-w-6xl) di tengah layar. Katalog 3 kolom.

## 10. Accessibility
- **Rasio Kontras:** Teks `Bark` di atas `Cream` dan teks `Cream` di atas `Moss` harus lolos rasio kontras WCAG AA (min 4.5:1).
- **Focus Order:** Harus masuk akal jika digunakan dengan tombol `Tab` pada keyboard (terutama untuk navigasi di *Admin Panel*).
- **Alt Text:** Setiap gambar produk atau foto artikel harus memiliki tag `alt=""` yang mendeskripsikan gambar (misal: "Kemasan Pupuk Cair Pandawa 1 Liter").
