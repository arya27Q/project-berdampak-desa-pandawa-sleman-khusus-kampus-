<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        Product::create([
            'name' => 'Pupuk Organik Cair Bintang',
            'category' => 'Pupuk Organik',
            'desc' => 'Meningkatkan kesuburan tanah dan merangsang pertumbuhan akar tanaman secara alami.',
            'price' => 'Rp 45.000',
            'badge' => 'Terlaris',
            'badgeTone' => 'leaf',
            'image_path' => null
        ]);

        Product::create([
            'name' => 'Probiotik Ternak Sehat',
            'category' => 'Probiotik Peternakan',
            'desc' => 'Menghilangkan bau kotoran dan meningkatkan nafsu makan hewan ternak Anda.',
            'price' => 'Rp 55.000',
            'badge' => 'Baru',
            'badgeTone' => 'clay',
            'image_path' => null
        ]);

        Product::create([
            'name' => 'Kompos Organik Super',
            'category' => 'Pupuk Organik',
            'desc' => 'Kompos matang dari bahan alami pilihan, siap pakai untuk menyuburkan kebun dan sawah.',
            'price' => 'Rp 25.000',
            'badge' => null,
            'badgeTone' => 'leaf',
            'image_path' => null
        ]);

        Article::create([
            'title' => 'Cara Membuat Kompos dari Limbah Rumah Tangga',
            'slug' => 'cara-membuat-kompos-dari-limbah-rumah-tangga',
            'excerpt' => 'Panduan praktis menyulap sisa makanan menjadi pupuk organik kaya nutrisi untuk tanaman hias dan sayur di pekarangan Anda.',
            'content' => 'Isi artikel panjang...',
            'tag' => 'Panduan',
            'image_path' => null
        ]);

        Article::create([
            'title' => 'Mengapa Probiotik Penting untuk Kesehatan Unggas?',
            'slug' => 'mengapa-probiotik-penting-untuk-kesehatan-unggas',
            'excerpt' => 'Pemberian probiotik secara rutin terbukti mampu menekan angka kematian dan mempercepat masa panen ayam broiler.',
            'content' => 'Isi artikel panjang...',
            'tag' => 'Peternakan',
            'image_path' => null
        ]);
    }
}
