# 💾 Skema Database & API Contract: Pandawa Kencana

Sebagai Lead Backend Engineer, berikut adalah rancangan arsitektur data (*Database Schema*) dan Kontrak API untuk sistem Pandawa Kencana.

## 1. Entity Relationship Diagram (ERD) & Schema
Secara fungsional, relasi antar entitas sengaja dibuat sederhana (*de-normalized* di beberapa titik) karena ini adalah aplikasi *Company Profile/Catalog*, bukan *E-Commerce* kompleks.

### Tabel `users` (Admin)
| Kolom | Tipe Data | Constraint / Keterangan |
|-------|-----------|-------------------------|
| `id` | BIGINT | PK, Auto Increment |
| `name` | VARCHAR(255) | Not Null |
| `email` | VARCHAR(255) | Not Null, Unique |
| `password` | VARCHAR(255) | Not Null (Hashed) |

### Tabel `products`
| Kolom | Tipe Data | Constraint / Keterangan |
|-------|-----------|-------------------------|
| `id` | BIGINT | PK, Auto Increment |
| `name` | VARCHAR(255) | Not Null |
| `category` | VARCHAR(100) | Enum ('Pupuk Organik', 'Probiotik') |
| `desc` | TEXT | Nullable |
| `price` | VARCHAR(100) | Not Null (contoh: "Rp50.000 / Liter") |
| `badge` | VARCHAR(50) | Nullable |
| `image_path` | VARCHAR(255) | Nullable |

### Tabel `articles`
| Kolom | Tipe Data | Constraint / Keterangan |
|-------|-----------|-------------------------|
| `id` | BIGINT | PK, Auto Increment |
| `title` | VARCHAR(255) | Not Null |
| `slug` | VARCHAR(255) | Not Null, Unique |
| `excerpt` | TEXT | Nullable |
| `content` | LONGTEXT | Not Null |
| `tag` | VARCHAR(50) | Not Null |
| `image_path` | VARCHAR(255) | Nullable |

### Tabel `leads`
| Kolom | Tipe Data | Constraint / Keterangan |
|-------|-----------|-------------------------|
| `id` | BIGINT | PK, Auto Increment |
| `name` | VARCHAR(255) | Not Null |
| `phone` | VARCHAR(20) | Not Null |
| `message` | TEXT | Nullable |
| `created_at` | TIMESTAMP | Not Null |

## 2. Indexing Strategy (Optimasi Kueri BTree)
Untuk memastikan respon aplikasi sangat cepat (*sub-100ms*), kolom berikut wajib di-index:
- `articles.slug` (UNIQUE INDEX): Karena pencarian artikel detail murni memakai URL (slug).
- `products.category` (INDEX): Digunakan secara intensif oleh filter pada Landing Page.
- `leads.created_at` (INDEX): Berguna bagi admin saat melakukan pengurutan/rekap data lead per bulan.

## 3. Data Integrity & Normalisasi
- **De-normalisasi Harga Produk:** Kolom `price` disimpan sebagai `VARCHAR` alih-alih `DECIMAL` karena transaksi tidak dilakukan secara *gateway* di dalam sistem (tidak ada komputasi keranjang belanja). Harga murni untuk keperluan *display* (cth: "Rp 150.000 / Karung 50kg").
- **De-normalisasi Kategori Produk & Tag Artikel:** Disimpan sebagai teks langsung, bukan sebagai ID ke tabel referensi (`categories` / `tags`). Tujuannya mempercepat *query* baca (tanpa JOIN) untuk MVP.

## 4. API Contract (Inertia & RESTful Standard)
Meskipun saat ini menggunakan **Inertia.js** (mereturn Vue Props), berikut adalah standar kontrak API jika fitur ini diekspos sebagai API publik/Mobile.

### GET `/api/products` (Katalog)
**Response JSON (200 OK):**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Bocashi Extra",
      "category": "Pupuk Organik",
      "price": "Rp50.000",
      "image_url": "https://pandawakencana.id/storage/products/xxx.jpg"
    }
  ],
  "meta": { "current_page": 1, "last_page": 5 }
}
```

### POST `/api/leads` (Kirim Pesanan)
**Request Payload JSON:**
```json
{
  "name": "Budi Santoso",
  "phone": "081234567890",
  "message": "Pesan 5 Karung"
}
```
**Response JSON (201 Created):**
```json
{
  "status": "success",
  "message": "Pesanan Anda telah diterima."
}
```
**Error Response JSON (422 Unprocessable Entity):**
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "phone": ["Format nomor telepon tidak valid."]
  }
}
```
