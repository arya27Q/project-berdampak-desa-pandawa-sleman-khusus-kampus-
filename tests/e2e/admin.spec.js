import { test, expect } from '@playwright/test';

test.describe('Admin Journeys', () => {
  
  test('Admin login with wrong credentials fails', async ({ page }) => {
    await page.goto('/admin-pandawa/login');
    
    await page.fill('input[type="email"]', 'wrong@example.com');
    await page.fill('input[type="password"]', 'wrongpassword');
    await page.click('button[type="submit"]');

    // Pastikan error muncul
    const errorMsg = page.locator('text=The provided credentials do not match our records.');
    await expect(errorMsg).toBeVisible();
  });

  test('Admin login with correct credentials succeeds', async ({ page }) => {
    // Karena test dijalankan di local, pastikan admin dengan admin@example.com ada di database (atau seeder).
    // Jika tidak ada, test ini mungkin gagal di sistem fresh. Disarankan untuk menggunakan db seeding.
    await page.goto('/admin-pandawa/login');
    
    // Asumsi default admin dari seeder
    await page.fill('input[type="email"]', 'admin@example.com');
    await page.fill('input[type="password"]', 'password');
    await page.click('button[type="submit"]');

    // Harus diarahkan ke dashboard
    await expect(page).toHaveURL(/\/admin-pandawa\/dashboard/);
    
    const dashboardTitle = page.locator('h2:has-text("Dashboard")');
    await expect(dashboardTitle).toBeVisible();
  });
});
