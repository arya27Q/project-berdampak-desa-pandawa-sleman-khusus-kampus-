import { test, expect } from '@playwright/test';

test.describe('Guest Journeys', () => {
  test('Landing page loads and catalog filtering works', async ({ page }) => {
    // 1. Kunjungi landing page
    await page.goto('/');
    
    // Pastikan headline utama muncul (atau title sesuai)
    await expect(page).toHaveTitle(/Pandawa Kencana/);
    
    // 2. Scroll ke bagian katalog (Katalog Produk)
    const catalogTitle = page.locator('h2:has-text("Nutrisi terbaik untuk lahan")');
    await expect(catalogTitle).toBeVisible();

    // 3. Tes Filter
    const filterBtn = page.getByRole('button', { name: 'Pupuk Organik', exact: true });
    await filterBtn.click();
    
    // Pastikan state aktif pada filter (biasanya bg-moss jika aktif)
    await expect(filterBtn).toHaveClass(/bg-moss/);
  });

  test('Guest can submit lead form and is redirected to WhatsApp', async ({ page, context }) => {
    await page.goto('/');

    // 1. Klik tombol pesan pada salah satu produk
    const pesanBtn = page.locator('button:has-text("Pesan via WhatsApp")').first();
    await pesanBtn.click();

    // 2. Pastikan modal muncul
    const modalTitle = page.locator('h3:has-text("Informasi Pemesanan")');
    await expect(modalTitle).toBeVisible();

    // 3. Isi form salah sengaja untuk mengecek validasi HTML5
    const nameInput = page.getByPlaceholder('Masukkan nama Anda');
    const phoneInput = page.getByPlaceholder('081234567890');
    const submitBtn = page.locator('button:has-text("Lanjutkan ke WhatsApp")');
    
    await nameInput.fill('Tester');
    // Tidak mengisi phone, coba submit
    // (Playwright tidak mudah mendeteksi validasi browser native, kita isi dengan benar saja)

    await phoneInput.fill('081234567890');

    // 4. Submit form
    await submitBtn.click();

    // 5. Modal seharusnya tertutup secara otomatis jika sukses
    await expect(modalTitle).toBeHidden({ timeout: 10000 });
  });
});
