<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Panduan Kunjungan dan Pelatihan Agribisnis',
                'excerpt' => 'Pelajari praktik terbaik agribisnis langsung dari pakarnya di fasilitas kami.',
                'content' => '<p>Program Kunjungan dan Pelatihan Agribisnis kami dirancang untuk memberikan wawasan mendalam tentang pertanian modern. Anda akan belajar tentang pengelolaan tanah, penggunaan pupuk organik yang tepat, dan teknik budidaya inovatif.</p>',
                'tag' => 'Pelatihan',
            ],
            [
                'title' => 'Manfaat Pupuk Organik Cair untuk Pertanian',
                'excerpt' => 'Mengapa pupuk organik cair menjadi pilihan utama petani sukses.',
                'content' => '<p>Pupuk organik cair tidak hanya ramah lingkungan tetapi juga mudah diserap oleh tanaman. Dengan penggunaan rutin, hasil panen akan meningkat secara signifikan sambil menjaga kelestarian tanah.</p>',
                'tag' => 'Edukasi Pupuk',
            ],
            [
                'title' => 'Probiotik Peternakan: Meningkatkan Kesehatan Hewan',
                'excerpt' => 'Rahasia di balik peternakan yang sehat dan produktif dengan probiotik.',
                'content' => '<p>Probiotik untuk peternakan membantu menjaga keseimbangan mikroflora pencernaan hewan. Hal ini berdampak langsung pada penyerapan nutrisi yang lebih baik, kesehatan hewan yang optimal, dan hasil ternak yang berkualitas.</p>',
                'tag' => 'Peternakan',
            ],
            [
                'title' => 'Cara Membuat dan Menggunakan Pupuk Kompos',
                'excerpt' => 'Langkah-langkah praktis membuat kompos berkualitas tinggi di rumah.',
                'content' => '<p>Pupuk kompos adalah salah satu elemen penting dalam pertanian organik. Pelajari bagaimana mengolah limbah organik menjadi nutrisi kaya yang sangat bermanfaat bagi pertumbuhan tanaman Anda.</p>',
                'tag' => 'Edukasi Pupuk',
            ],
            [
                'title' => 'Memilih Benih dan Bibit Tanaman Berkualitas',
                'excerpt' => 'Kunci sukses pertanian dimulai dari pemilihan benih yang tepat.',
                'content' => '<p>Benih dan bibit tanaman yang unggul akan menentukan kualitas hasil panen. Artikel ini membahas cara mengenali bibit berkualitas dan teknik penyemaian yang benar untuk hasil yang maksimal.</p>',
                'tag' => 'Agribisnis',
            ],
        ];

        foreach ($articles as $article) {
            DB::table('articles')->insert([
                'title' => $article['title'],
                'slug' => Str::slug($article['title']),
                'excerpt' => $article['excerpt'],
                'content' => $article['content'],
                'tag' => $article['tag'],
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
