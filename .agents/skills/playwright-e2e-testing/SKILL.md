---
name: playwright-e2e-testing
description: Panduan dan referensi untuk melakukan setup dan menulis pengujian End-to-End (E2E) menggunakan Playwright di dalam project Laravel + Vue/Inertia.
---

# Panduan Playwright E2E Testing

Gunakan skill ini setiap kali *user* meminta untuk melakukan setup Playwright atau menulis pengujian UI/E2E baru pada aplikasi.

## 1. Setup Dasar
- Pastikan Playwright terinstall menggunakan `npm install -D @playwright/test playwright`.
- Instal *browser* bawaan menggunakan `npx playwright install chromium`.
- Selalu tambahkan `playwright-report/` dan `test-results/` ke dalam `.gitignore`.

## 2. Konfigurasi Standar (`playwright.config.js`)
- Letakkan pengujian di folder `tests/e2e`.
- Konfigurasi `webServer` agar otomatis menjalankan `php artisan serve`:
  ```js
  webServer: {
    command: 'php artisan serve',
    url: 'http://127.0.0.1:8000',
    reuseExistingServer: !process.env.CI,
    timeout: 120 * 1000,
  }
  ```

## 3. Penulisan Tes (Best Practices)
- Gunakan fitur **Strict Mode** Playwright dengan bijak. Hindari `locator('button:has-text("X")')` jika teks tersebut mungkin ada di lebih dari satu elemen (seperti FAQ dan Filter).
- **Gunakan:** `page.getByRole('button', { name: 'X', exact: true })` untuk keakuratan tinggi.
- Jika form memiliki *rate limiting* (`throttle`), pertimbangkan untuk menambahkan waktu jeda atau menghapus limitasi tersebut di *environment* lokal/tes (atau gunakan `php artisan cache:clear` secara rutin).
- Saat berhadapan dengan `window.open` atau integrasi WhatsApp (wa.me), tes sering mengalami *timeout* jika diblokir oleh sistem anti-popup. Validasi kesuksesan melalui perubahan *state* UI (misalnya modal tertutup secara otomatis: `expect(modal).toBeHidden()`) alih-alih memaksa menunggu *tab* baru terbuka.

## 4. Script NPM
Selalu tambahkan *script* ini di `package.json` untuk memudahkan *user*:
```json
"scripts": {
    "test:e2e": "playwright test",
    "test:e2e:ui": "playwright test --ui",
    "test:e2e:ci": "playwright test --reporter=github"
}
```
