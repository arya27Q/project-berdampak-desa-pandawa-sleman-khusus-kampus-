<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';

const ARTICLES = [
  {
    tag: 'Panduan',
    title: 'Cara Mengaplikasikan Pupuk Organik Cair yang Benar',
    excerpt: 'Dosis, waktu, dan teknik penyemprotan agar nutrisi terserap maksimal oleh tanaman.',
    image: 'https://images.unsplash.com/photo-1620675506518-3df066bb2b30?w=700&h=480&fit=crop&auto=format',
    date: '12 Sep 2026'
  },
  {
    tag: 'Edukasi',
    title: 'Mengenal Peran Mikroba Probiotik untuk Kesuburan Tanah',
    excerpt: 'Bagaimana mikroorganisme menghidupkan tanah dan menekan penyakit tanaman secara alami.',
    image: 'https://images.unsplash.com/photo-1719701285590-68cac7ad9a49?w=700&h=480&fit=crop&auto=format',
    date: '5 Sep 2026'
  },
  {
    tag: 'Peternakan',
    title: 'Probiotik untuk Ternak: Manfaat & Cara Pemberian',
    excerpt: 'Tips memberikan probiotik pada pakan untuk ternak yang lebih sehat dan produktif.',
    image: 'https://images.unsplash.com/photo-1557139582-4206cd15c69a?w=700&h=480&fit=crop&auto=format',
    date: '28 Agu 2026'
  },
  {
    tag: 'Panduan',
    title: 'Panduan Membuat Kompos Sendiri di Rumah',
    excerpt: 'Memanfaatkan sisa bahan organik rumah tangga menjadi pupuk berkualitas.',
    image: 'https://images.unsplash.com/photo-1597868165956-03a6827955b1?w=700&h=480&fit=crop&auto=format',
    date: '15 Agu 2026'
  },
  {
    tag: 'Edukasi',
    title: 'Keuntungan Beralih ke Pertanian Organik',
    excerpt: 'Dampak positif pada lingkungan, hasil panen, dan kesehatan.',
    image: 'https://images.unsplash.com/photo-1558388556-2261d4cc1938?w=700&h=480&fit=crop&auto=format',
    date: '1 Agu 2026'
  }
];
</script>

<template>
  <Head title="Semua Artikel | Pandawa Kencana" />

  <div class="min-h-screen bg-sand text-bark font-sans">
    <!-- Navbar -->
    <header class="sticky top-0 z-50 border-b border-leaf/15 bg-cream/85 backdrop-blur-md">
      <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
        <Link href="/" class="flex items-center gap-2.5">
          <span class="flex h-10 w-10 items-center justify-center rounded-full bg-moss text-cream">
            <Icon name="leaf" class="h-5 w-5" />
          </span>
          <span class="leading-tight">
            <span class="block font-display text-lg font-semibold text-moss">Pandawa Kencana</span>
            <span class="block text-[0.7rem] font-medium uppercase tracking-[0.2em] text-leaf">Multi Farm</span>
          </span>
        </Link>
        <Link href="/" class="text-sm font-semibold text-moss hover:text-sprout transition-colors flex items-center gap-2">
          <Icon name="arrow" class="h-4 w-4 rotate-180" />
          Kembali ke Beranda
        </Link>
      </div>
    </header>

    <!-- Header -->
    <section class="bg-moss py-16 px-6">
      <div class="mx-auto max-w-6xl text-center">
        <h1 class="font-display text-4xl font-semibold text-cream md:text-5xl">Artikel & Edukasi Tani</h1>
        <p class="mt-4 text-cream/80 max-w-2xl mx-auto text-lg">
          Kumpulan panduan, tips, dan informasi terbaru seputar pertanian dan peternakan organik.
        </p>
      </div>
    </section>

    <!-- Articles Grid -->
    <section class="py-20 px-6">
      <div class="mx-auto max-w-6xl grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
        <article v-for="a in ARTICLES" :key="a.title" class="group flex flex-col overflow-hidden rounded-2xl border border-leaf/10 bg-cream shadow-sm transition-shadow hover:shadow-lg">
          <div class="aspect-16/10 overflow-hidden bg-parchment relative">
            <img :src="a.image" :alt="a.title" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
            <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors duration-500"></div>
          </div>
          <div class="flex flex-1 flex-col p-6">
            <div class="flex items-center justify-between mb-3">
              <span class="rounded-full bg-sand px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-wide text-leaf">
                {{ a.tag }}
              </span>
              <span class="text-xs text-bark/50 font-medium">{{ a.date }}</span>
            </div>
            <h3 class="font-display text-xl font-semibold leading-snug text-moss">{{ a.title }}</h3>
            <p class="mt-3 flex-1 text-sm leading-relaxed text-bark/70">{{ a.excerpt }}</p>
            <a href="#" class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-clay transition-colors hover:text-moss">
              Baca selengkapnya
              <Icon name="arrow" class="h-4 w-4" />
            </a>
          </div>
        </article>
      </div>
      
      <!-- Pagination -->
      <div class="mx-auto max-w-6xl mt-16 flex justify-center gap-2">
        <button class="w-10 h-10 rounded-full flex items-center justify-center border border-leaf/20 text-bark/40 cursor-not-allowed">
          <Icon name="arrow" class="h-4 w-4 rotate-180" />
        </button>
        <button class="w-10 h-10 rounded-full flex items-center justify-center bg-moss text-cream font-bold">1</button>
        <button class="w-10 h-10 rounded-full flex items-center justify-center border border-leaf/20 text-bark hover:bg-cream transition-colors">2</button>
        <button class="w-10 h-10 rounded-full flex items-center justify-center border border-leaf/20 text-bark hover:bg-cream transition-colors">
          <Icon name="arrow" class="h-4 w-4" />
        </button>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-bark text-cream/80 border-t border-cream/10">
      <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-8 text-center text-sm sm:flex-row">
        <span>© 2026 CV Pandawa Kencana Multi Farm.</span>
        <Link href="/admin/dashboard" class="transition-colors hover:text-sprout">Login Admin</Link>
      </div>
    </footer>
  </div>
</template>
