# 🛡️ Threat Modeling & Security Architecture: Pandawa Kencana

Sebagai Security Architect, berikut adalah analisis pemodelan ancaman (*Threat Modeling*) untuk aplikasi Pandawa Kencana (Laravel 11 + Vue/Inertia).

## 1. Attack Surface Analysis
Titik interaksi di mana sistem rentan diserang:
- **Public Endpoint (`GET /`, `GET /articles`)**: Rentan terhadap serangan *Layer 7 DDoS* (bot scraping/flooding).
- **Form Input (`POST /lead`)**: Rentan terhadap *Spam/Bot Flooding*, *XSS* (jika pesan dirender mentah di admin), dan *Injection*.
- **Admin Authentication (`POST /admin/login`)**: Rentan terhadap *Brute-force*, *Credential Stuffing*, dan kebocoran *Session/CSRF*.
- **CMS Endpoint (`POST/PUT/DELETE /admin/products` & `articles`)**: Rentan terhadap *Insecure Direct Object Reference (IDOR)*, manipulasi *file upload* (shell upload via gambar), dan *Cross-Site Scripting (XSS)*.
- **WhatsApp Integration (Client-side `wa.me`)**: Rentan terhadap manipulasi URL (*Phishing*/URL Redirect) jika input dari user tidak di-sanitize sebelum dimasukkan ke dalam link WA.

## 2. Threat Scenarios (Skenario Ancaman Utama)
1. **Skenario 1: Mass Form Spam (DDoS via WA Form)**
   - *Ancaman*: Bot mengisi form `/lead` ribuan kali per menit.
   - *Dampak*: Database `leads` bengkak, *disk full*, dan aplikasi menjadi lambat (DoS).
2. **Skenario 2: Shell Upload via Fitur Gambar CMS**
   - *Ancaman*: Attacker yang berhasil masuk ke admin mengunggah *file* `.php` berkedok `.jpg` pada modul Produk/Artikel.
   - *Dampak*: Remote Code Execution (RCE), server dikendalikan penuh oleh peretas.
3. **Skenario 3: Admin Account Takeover**
   - *Ancaman*: Attacker menebak *password* admin via *brute-force* karena tidak adanya limitasi.
   - *Dampak*: CMS diretas, data produk diubah dengan link *phishing* atau penipuan (merusak reputasi).

## 3. Mitigation Strategy (Strategi Mitigasi Spesifik Laravel)
- **Mitigasi Skenario 1 (Spam Form):**
  - *Code Level*: Gunakan *middleware* `throttle:10,1` pada route `/lead`. Wajibkan validasi `string|max:255` untuk membatasi *payload*. Pertimbangkan menambah Google reCAPTCHA v3 atau Cloudflare Turnstile (invisible CAPTCHA).
- **Mitigasi Skenario 2 (Shell Upload):**
  - *Code Level*: Validasi ketat `image|mimes:jpeg,png,jpg,webp|max:2048`.
  - *Infra Level*: Nonaktifkan eksekusi skrip PHP di dalam folder `storage/app/public/` (via Nginx/Apache config). Jangan simpan aset *public* di folder `public/` utama, gunakan *symlink* Laravel Storage.
- **Mitigasi Skenario 3 (Takeover Admin):**
  - *Code Level*: Implementasi `throttle:5,1` pada route `/admin/login`. Nonaktifkan sepenuhnya fitur *Register* publik (sudah kita lakukan).
  - *Infra Level*: Pindahkan URL halaman login dari `/admin/login` ke URL yang lebih *obscure* (opsional), serta terapkan SSL/TLS (HTTPS) untuk mencegah *Man-in-the-Middle (MitM)*.

## 4. Compliance & Privacy Check
- **Data in Transit**: Wajib menggunakan HTTPS (Enkripsi SSL/TLS) via *Let's Encrypt* atau *Cloudflare SSL* untuk melindungi kredensial saat login admin.
- **Data at Rest**: Kata sandi wajib di-*hash* dengan algoritma modern bawaan Laravel 11 (Bcrypt/Argon2). Data `leads` (Nama & Nomor HP) tidak dienkripsi secara penuh di *database* (demi kemudahan baca), namun *database server* harus diblokir dari akses publik (port 3306 hanya listen ke `localhost`).
- **Data Sanitization**: Vue/Inertia secara otomatis me-*sanitize* output (melindungi dari XSS), namun pastikan tidak ada penggunaan instruksi `v-html` secara sembarangan di komponen frontend.
