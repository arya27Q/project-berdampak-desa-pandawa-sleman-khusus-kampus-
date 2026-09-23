<script setup>
import { ref, computed } from 'vue';
import Icon from '@/Components/Icon.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  products: {
    type: Array,
    default: () => []
  },
  articles: {
    type: Array,
    default: () => []
  }
});

import { usePage } from '@inertiajs/vue3';
const page = usePage();
const WHATSAPP_NUMBER = computed(() => {
  let num = page.props.settings?.whatsapp || '0812-3456-7890';
  // convert 08... to 628... and strip non-digits
  num = num.replace(/\D/g,'');
  if (num.startsWith('0')) num = '62' + num.substring(1);
  return num;
});

const NAV_LINKS = [
  { label: 'Beranda', href: '#beranda' },
  { label: 'Profil', href: '#profil' },
  { label: 'Katalog', href: '#katalog' },
  { label: 'Artikel Edukasi', href: '#artikel' },
  { label: 'Kontak', href: '#kontak' },
];

const DEFAULT_ARTICLE_IMAGES = [
  'https://images.unsplash.com/photo-1592982537447-6f296d0ba967?w=700&h=480&fit=crop&auto=format',
  'https://images.unsplash.com/photo-1586771107445-d3af9e173c52?w=700&h=480&fit=crop&auto=format',
  'https://images.unsplash.com/photo-1530836369250-ef71a3f5e43d?w=700&h=480&fit=crop&auto=format',
  'https://images.unsplash.com/photo-1585437812513-4338e932b1ba?w=700&h=480&fit=crop&auto=format',
  'https://images.unsplash.com/photo-1620675506518-3df066bb2b30?w=700&h=480&fit=crop&auto=format'
];



const FILTERS = ['Semua', 'Pupuk Organik', 'Probiotik Peternakan', 'Terlaris', 'Populer'];

const STATS = [
  { value: '50+', label: 'Mitra Tani' },
  { value: '100%', label: 'Bahan Organik' },
  { value: '10+', label: 'Tahun Pengalaman' },
  { value: 'DIY & Jateng', label: 'Jangkauan Pengiriman' },
];

const STEPS = [
  {
    n: '01',
    title: 'Pilih Produk',
    desc: 'Telusuri katalog dan tentukan pupuk atau probiotik yang sesuai kebutuhan lahan Anda.',
    icon: 'basket',
  },
  {
    n: '02',
    title: 'Hubungi WhatsApp',
    desc: 'Klik tombol pesan, chat otomatis terisi. Tim kami siap membantu jumlah dan pengiriman.',
    icon: 'chat',
  },
  {
    n: '03',
    title: 'Konfirmasi & Kirim',
    desc: 'Konfirmasi pesanan dan alamat, produk dikirim ke seluruh DIY dan Jawa Tengah.',
    icon: 'truck',
  },
];



const TESTIMONIALS = [
  {
    quote: 'Sejak pakai pupuk organik Pandawa, struktur tanah sawah makin gembur. Hasil panen padi musim ini meningkat drastis dan biaya pupuk kimia jadi jauh lebih hemat.',
    name: 'Pak Marno',
    role: 'Ketua Kelompok Tani, Cangkringan',
    image: 'https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=150&h=150&fit=crop&auto=format'
  },
  {
    quote: 'Probiotik ternak dari Pandawa benar-benar ampuh menghilangkan bau kandang kambing. Selain itu, ternak jadi lebih sehat dan makannya lahap banget.',
    name: 'Budi Santoso',
    role: 'Peternak Kambing Etawa, Sleman',
    image: 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&h=150&fit=crop&auto=format'
  },
  {
    quote: 'Awalnya ragu beralih ke organik, tapi setelah didampingi langsung oleh tim Pandawa, sekarang kebun sayur saya 100% bebas kimia. Panen melimpah.',
    name: 'Ibu Ningsih',
    role: 'Petani Sayur, Kaliurang',
    image: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150&h=150&fit=crop&auto=format'
  }
];

const FAQS = [
  {
    q: 'Apakah melayani pembelian eceran (B2C)?',
    a: 'Ya, kami melayani pembelian dalam jumlah kecil untuk konsumen umum maupun kebutuhan rumah tangga.'
  },
  {
    q: 'Bagaimana cara menjadi agen atau mitra Pandawa?',
    a: 'Anda dapat menghubungi kami via WhatsApp. Kami memiliki program kemitraan khusus dengan harga grosir untuk kelompok tani dan toko pertanian.'
  },
  {
    q: 'Apakah pupuk organik cair (POC) bisa dicampur pestisida kimia?',
    a: 'Sebaiknya hindari mencampur POC dengan bahan kimia sintetis agar mikroba baik di dalam pupuk tetap hidup dan bekerja maksimal di tanah.'
  },
  {
    q: 'Apakah ada biaya pengiriman?',
    a: 'Gratis ongkos kirim untuk wilayah Sleman dengan minimal pembelian tertentu. Untuk luar daerah, ongkir disesuaikan dengan jasa ekspedisi/kargo.'
  }
];

function waLink(productName = '') {
  const text = productName
    ? `Halo Pandawa Kencana Multi Farm, saya ingin memesan *${productName}*.\n\nJumlah: \nAlamat pengiriman: \n\nMohon info ketersediaan dan totalnya. Terima kasih.`
    : 'Halo Pandawa Kencana Multi Farm, saya ingin bertanya tentang produk pupuk organik dan probiotiknya.';
  return `https://wa.me/${WHATSAPP_NUMBER.value}?text=${encodeURIComponent(text)}`;
}

const menuOpen = ref(false);
const filter = ref('Semua');
const activeFaq = ref(null);

const toggleFaq = (idx) => {
  activeFaq.value = activeFaq.value === idx ? null : idx;
};

const visibleProducts = computed(() => {
  if (filter.value === 'Semua') return props.products;
  if (filter.value === 'Terlaris' || filter.value === 'Populer') {
    return props.products.filter(p => p.badge && p.badge.toLowerCase() === filter.value.toLowerCase());
  }
  return props.products.filter(p => p.category === filter.value);
});

const showLeadModal = ref(false);
const leadProductName = ref('');

const leadForm = useForm({
  name: '',
  phone: '',
  message: '',
  company_website: ''
});

const openModal = (productName = '') => {
  leadProductName.value = productName;
  leadForm.message = productName ? `Saya ingin pesan ${productName}` : '';
  showLeadModal.value = true;
};

const closeModal = () => {
  showLeadModal.value = false;
  leadForm.reset();
};

const submitLead = () => {
  leadForm.post('/lead', {
    onSuccess: () => {
      window.open(waLink(leadProductName.value), '_blank');
      closeModal();
    }
  });
};
</script>

<template>
  <Head title="Pandawa Kencana | Pertanian Berkelanjutan" />

  <div class="min-h-screen bg-cream text-bark font-sans">
    <!-- Top Bar -->
    <div class="hidden bg-moss text-cream/90 md:block">
      <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-2 text-xs">
        <div class="flex items-center gap-6">
          <span class="inline-flex items-center gap-1.5">
            <Icon name="clock" class="h-3.5 w-3.5" />
            Buka Sen–Jum: 08.00–16.00 WIB
          </span>
          <span class="inline-flex items-center gap-1.5">
            <Icon name="pin" class="h-3.5 w-3.5" />
            Desa Cangkringan, Sleman
          </span>
        </div>
        <button @click="openModal()" class="inline-flex items-center gap-1.5 font-medium transition-colors hover:text-sprout">
          <Icon name="chat" class="h-3.5 w-3.5" />
          Customer Service: {{ $page.props.settings?.whatsapp || '0812-3456-7890' }}
        </button>
      </div>
    </div>

    <!-- Navbar -->
    <header class="sticky top-0 z-50 border-b border-leaf/15 bg-cream/85 backdrop-blur-md">
      <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
        <a href="#beranda" class="flex items-center gap-2.5">
          <span class="flex h-10 w-10 items-center justify-center rounded-full bg-moss text-cream">
            <Icon name="leaf" class="h-5 w-5" />
          </span>
          <span class="leading-tight">
            <span class="block font-display text-lg font-semibold text-moss">Pandawa Kencana</span>
            <span class="block text-[0.7rem] font-medium uppercase tracking-[0.2em] text-leaf">Multi Farm</span>
          </span>
        </a>

        <nav class="hidden items-center gap-8 lg:flex">
          <a v-for="l in NAV_LINKS" :key="l.href" :href="l.href" class="text-sm font-medium text-bark/70 transition-colors hover:text-moss">
            {{ l.label }}
          </a>
        </nav>

        <div class="flex items-center gap-3">
          <button @click="openModal()" class="hidden rounded-full bg-moss px-5 py-2 text-sm font-semibold text-cream transition-colors hover:bg-leaf sm:inline-flex">
            Pesan Sekarang
          </button>
          <button class="flex h-10 w-10 items-center justify-center rounded-lg border border-leaf/20 text-moss lg:hidden" @click="menuOpen = !menuOpen" aria-label="Buka menu">
            <div class="space-y-1.5">
              <span class="block h-0.5 w-5 bg-current"></span>
              <span class="block h-0.5 w-5 bg-current"></span>
              <span class="block h-0.5 w-5 bg-current"></span>
            </div>
          </button>
        </div>
      </div>

      <nav v-if="menuOpen" class="border-t border-leaf/15 bg-cream px-6 py-4 lg:hidden">
        <div class="flex flex-col gap-3">
          <a v-for="l in NAV_LINKS" :key="l.href" :href="l.href" @click="menuOpen = false" class="text-sm font-medium text-bark/80">
            {{ l.label }}
          </a>
          <button @click="openModal()" class="mt-1 rounded-full bg-moss px-5 py-2.5 text-center text-sm font-semibold text-cream">
            Pesan Sekarang
          </button>
        </div>
      </nav>
    </header>

    <!-- Hero -->
    <section id="beranda" class="relative overflow-hidden">
      <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1558388556-2261d4cc1938?w=1600&h=1000&fit=crop&auto=format" alt="Lahan pertanian organik di Desa Cangkringan" class="h-full w-full bg-moss object-cover" />
        <div class="absolute inset-0 bg-linear-to-r from-bark/85 via-moss/70 to-moss/25"></div>
      </div>

      <div class="relative mx-auto grid max-w-6xl grid-cols-1 gap-10 px-6 py-20 md:py-32 lg:grid-cols-12">
        <div class="lg:col-span-8">
          <span class="inline-flex items-center gap-2 rounded-full border border-cream/30 bg-cream/10 px-4 py-1.5 text-xs font-medium uppercase tracking-[0.18em] text-cream/90">
            <span class="h-1.5 w-1.5 rounded-full bg-sprout"></span>
            CV Pandawa Kencana Multi Farm · Sleman, Yogyakarta
          </span>
          <h1 class="mt-6 font-display text-4xl font-semibold leading-[1.05] text-cream sm:text-5xl md:text-6xl">
            {{ $page.props.settings?.headline || 'Pupuk Organik & Probiotik Berkualitas untuk Panen Melimpah' }}
          </h1>
          <p class="mt-5 max-w-xl text-lg leading-relaxed text-cream/85">
            Produsen pupuk organik dan probiotik terpercaya dari Desa Cangkringan untuk hasil panen optimal dan ramah lingkungan.
          </p>
          <div class="mt-8 flex flex-wrap gap-3">
            <a href="#katalog" class="rounded-full bg-sprout px-7 py-3.5 text-sm font-semibold text-bark shadow-lg shadow-bark/20 transition-transform hover:-translate-y-0.5 hover:bg-cream">
              Lihat Katalog
            </a>
            <a href="#profil" class="rounded-full border border-cream/40 px-7 py-3.5 text-sm font-semibold text-cream transition-colors hover:bg-cream/10">
              Pelajari Lebih Lanjut
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Statistik -->
    <section class="border-y border-leaf/15 bg-sand">
      <div class="mx-auto grid max-w-6xl grid-cols-2 gap-6 px-6 py-8 lg:grid-cols-4">
        <div v-for="s in STATS" :key="s.label" class="text-center">
          <p class="font-display text-2xl font-semibold text-moss md:text-3xl">{{ s.value }}</p>
          <p class="mt-1 text-xs font-medium uppercase tracking-wide text-bark/60 md:text-sm">{{ s.label }}</p>
        </div>
      </div>
    </section>

    <!-- Tentang Kami & Profil Perusahaan -->
    <section id="profil" class="mx-auto max-w-6xl px-6 py-20 md:py-28">
      <!-- TENTANG KAMI -->
      <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 mb-20 md:mb-24">
        <div class="relative lg:col-span-5">
          <div class="overflow-hidden rounded-3xl">
            <img src="https://images.unsplash.com/photo-1597868165956-03a6827955b1?w=900&h=1000&fit=crop&auto=format" alt="Proses produksi pupuk organik" class="h-full w-full bg-parchment object-cover" />
          </div>
          <div class="absolute -bottom-6 -right-4 hidden rounded-2xl bg-moss px-6 py-5 text-cream shadow-xl sm:block">
            <p class="font-display text-3xl font-semibold">10+</p>
            <p class="text-[0.65rem] uppercase tracking-widest text-cream/80 mt-1">Tahun Melayani Petani</p>
          </div>
        </div>

        <div class="lg:col-span-7">
          <span class="text-xs font-semibold uppercase tracking-[0.2em] text-leaf">Tentang Kami</span>
          <h2 class="mt-3 font-display text-3xl font-semibold leading-tight text-moss md:text-4xl">
            Lahir dari tanah Cangkringan, tumbuh bersama petani.
          </h2>
          <p class="mt-5 leading-relaxed text-bark/75">
            Pandawa Kencana Multi Farm adalah usaha pertanian yang berlokasi di Desa Cangkringan, Sleman. Kami memproduksi pupuk organik dan probiotik untuk mengembalikan kesuburan tanah secara alami tanpa merusak lingkungan.
          </p>
          <p class="mt-4 leading-relaxed text-bark/75">
            Komitmen kami sederhana: mendukung pertanian berkelanjutan yang sehat bagi tanah, tanaman, dan generasi mendatang. Setiap produk kami dibuat dengan ketelitian agar mitra tani memperoleh hasil panen terbaik.
          </p>
          
          <div class="my-8 h-px w-full bg-leaf/15"></div>
          
          <div class="flex gap-12">
            <div>
              <p class="font-display text-3xl font-semibold text-moss">500+</p>
              <p class="text-xs text-bark/60 mt-1">Mitra Tani Terbantu</p>
            </div>
            <div>
              <p class="font-display text-3xl font-semibold text-moss">100%</p>
              <p class="text-xs text-bark/60 mt-1">Bahan Organik Alami</p>
            </div>
          </div>
        </div>
      </div>

      <!-- PROFIL PERUSAHAAN -->
      <div class="max-w-4xl">
        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-leaf">Profil Perusahaan</span>
        <h2 class="mt-3 font-display text-3xl font-semibold leading-tight text-moss md:text-4xl">
          Mendukung ekosistem pertanian lokal Sleman
        </h2>
        <p class="mt-5 leading-relaxed text-bark/75">
          CV Pandawa Kencana Multi Farm berdiri di Desa Cangkringan dengan visi memajukan pertanian berkelanjutan. Kami memproduksi pupuk organik dan probiotik berkualitas untuk mengembalikan kesuburan tanah secara alami.
        </p>
        <p class="mt-4 leading-relaxed text-bark/75">
          Lebih dari sekadar produsen, kami hadir sebagai mitra edukasi bagi kelompok tani — mendampingi dari pemilihan produk, aplikasi, hingga panen, agar hasil melimpah dan ramah lingkungan.
        </p>
        <ul class="mt-7 grid gap-4 sm:grid-cols-2">
          <li v-for="item in ['Produksi lokal Desa Cangkringan', 'Pendampingan mitra tani B2B', 'Melayani konsumen umum B2C', 'Pengiriman se-DIY & Jateng']" :key="item" class="flex items-center gap-2.5 text-sm text-bark/80">
            <Icon name="check" class="h-4 w-4 shrink-0 text-leaf" />
            {{ item }}
          </li>
        </ul>
      </div>
    </section>

    <!-- Katalog Produk -->
    <section id="katalog" class="bg-sand py-20 md:py-28">
      <div class="mx-auto max-w-6xl px-6">
        <div class="mx-auto max-w-2xl text-center">
          <span class="text-xs font-semibold uppercase tracking-[0.2em] text-leaf">Katalog Produk</span>
          <h2 class="mt-3 font-display text-3xl font-semibold text-moss md:text-4xl">
            Nutrisi terbaik untuk lahan & ternak
          </h2>
          <p class="mt-4 text-bark/70">
            Saring berdasarkan kategori, lalu pesan langsung via WhatsApp dengan form otomatis.
          </p>
        </div>

        <!-- Filter -->
        <div class="mt-10 flex flex-wrap justify-center gap-2">
          <button v-for="f in FILTERS" :key="f" @click="filter = f" :class="['rounded-full px-5 py-2 text-sm font-semibold transition-colors', filter === f ? 'bg-moss text-cream' : 'border border-leaf/25 bg-cream text-bark/70 hover:border-leaf/50']">
            {{ f }}
          </button>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-7 sm:grid-cols-2 lg:grid-cols-3">
          <article v-for="p in visibleProducts" :key="p.name" class="group flex flex-col overflow-hidden rounded-2xl border border-leaf/10 bg-cream shadow-sm transition-shadow hover:shadow-lg">
            <div class="relative aspect-4/3 overflow-hidden bg-parchment">
              <img :src="p.image_path ? '/storage/' + p.image_path : 'https://images.unsplash.com/photo-1599839619722-39751411ea63?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80'" :alt="p.name" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
              <span v-if="p.badge" :class="['absolute left-3 top-3 rounded-full px-3 py-1 text-[0.7rem] font-semibold text-cream', p.badgeTone === 'clay' ? 'bg-clay' : 'bg-leaf']">
                {{ p.badge }}
              </span>
              <span class="absolute right-3 top-3 rounded-full bg-cream/90 px-3 py-1 text-[0.7rem] font-medium text-moss">
                {{ p.category }}
              </span>
            </div>
            <div class="flex flex-1 flex-col p-5">
              <h3 class="font-display text-lg font-semibold text-moss">{{ p.name }}</h3>
              <p class="mt-2 flex-1 text-sm leading-relaxed text-bark/70">{{ p.desc }}</p>
              <p class="mt-4 font-display text-lg font-semibold text-clay">{{ p.price }}</p>
              <button @click="openModal(p.name)" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full bg-moss px-4 py-2.5 text-sm font-semibold text-cream transition-colors hover:bg-leaf">
                <Icon name="whatsapp" class="h-4 w-4" />
                Pesan via WhatsApp
              </button>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- Testimoni -->
    <section class="bg-sand py-20 md:py-28">
      <div class="mx-auto max-w-6xl px-6">
        <div class="text-center mb-14">
          <span class="text-xs font-semibold uppercase tracking-[0.2em] text-leaf">Kata Mereka</span>
          <h2 class="mt-3 font-display text-3xl font-semibold text-moss md:text-4xl">
            Bukti nyata di lahan petani
          </h2>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
          <div v-for="(t, i) in TESTIMONIALS" :key="i" class="rounded-3xl bg-cream p-8 shadow-sm border border-leaf/10 relative flex flex-col">
            <Icon name="chat" class="absolute right-8 top-8 h-8 w-8 text-leaf/10" />
            <div class="mb-6 flex gap-1 text-amber-400">
              <Icon name="check" class="h-4 w-4" v-for="n in 5" :key="n" />
            </div>
            <p class="text-sm leading-relaxed text-bark/80 mb-8 italic">"{{ t.quote }}"</p>
            <div class="flex items-center gap-4 mt-auto">
              <img :src="t.image" class="h-12 w-12 rounded-full object-cover border border-leaf/20" />
              <div>
                <p class="font-bold text-moss text-sm">{{ t.name }}</p>
                <p class="text-[0.65rem] text-bark/60 uppercase tracking-widest">{{ t.role }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Alur Pemesanan -->
    <section class="mx-auto max-w-6xl px-6 py-20 md:py-28">
      <div class="mx-auto max-w-2xl text-center">
        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-leaf">Alur Pemesanan</span>
        <h2 class="mt-3 font-display text-3xl font-semibold text-moss md:text-4xl">
          Tiga langkah mudah untuk memesan
        </h2>
        <p class="mt-4 text-bark/70">
          Sederhana dan cepat — dirancang agar semua kalangan petani bisa memesan tanpa ribet.
        </p>
      </div>

      <div class="mt-14 grid grid-cols-1 gap-6 md:grid-cols-3">
        <div v-for="(s, i) in STEPS" :key="s.n" class="relative">
          <div class="h-full rounded-2xl border border-leaf/12 bg-cream p-7">
            <div class="flex items-center justify-between">
              <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-sand text-moss">
                <Icon :name="s.icon" class="h-6 w-6" />
              </span>
              <span class="font-display text-3xl font-semibold text-leaf/25">{{ s.n }}</span>
            </div>
            <h3 class="mt-5 font-display text-lg font-semibold text-moss">{{ s.title }}</h3>
            <p class="mt-2 text-sm leading-relaxed text-bark/70">{{ s.desc }}</p>
          </div>
          <div v-if="i < STEPS.length - 1" class="absolute -right-3 top-1/2 hidden -translate-y-1/2 text-leaf/40 md:block">
            <Icon name="arrow" class="h-6 w-6" />
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="mx-auto max-w-3xl px-6 py-20 md:py-28">
      <div class="text-center mb-12">
        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-leaf">Tanya Jawab</span>
        <h2 class="mt-3 font-display text-3xl font-semibold text-moss md:text-4xl">
          Pertanyaan yang sering diajukan
        </h2>
      </div>
      <div class="space-y-4">
        <div v-for="(faq, i) in FAQS" :key="i" class="rounded-2xl border border-leaf/15 bg-cream overflow-hidden">
          <button @click="toggleFaq(i)" class="flex w-full items-center justify-between px-6 py-5 text-left font-semibold text-moss transition-colors hover:bg-leaf/5">
            <span>{{ faq.q }}</span>
            <Icon :name="activeFaq === i ? 'check' : 'plus'" class="h-5 w-5 shrink-0 text-leaf transition-transform duration-300" :class="{ 'rotate-180': activeFaq === i }" />
          </button>
          <div v-show="activeFaq === i" class="px-6 pb-6 pt-2 text-sm leading-relaxed text-bark/75">
            {{ faq.a }}
          </div>
        </div>
      </div>
    </section>

    <!-- Artikel / Edukasi Tani -->
    <section id="artikel" class="bg-sand py-20 md:py-28">
      <div class="mx-auto max-w-6xl px-6">
        <div class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
          <div class="max-w-xl">
            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-leaf">Artikel & Edukasi Tani</span>
            <h2 class="mt-3 font-display text-3xl font-semibold text-moss md:text-4xl">
              Belajar bertani lebih cerdas
            </h2>
            <p class="mt-4 text-bark/70">
              Bagian dari program literasi tani untuk masyarakat Desa Cangkringan.
            </p>
          </div>
          <Link href="/articles" class="shrink-0 rounded-full border border-leaf/30 px-5 py-2.5 text-sm font-semibold text-moss transition-colors hover:bg-cream">
            Lihat Semua Artikel
          </Link>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-7 md:grid-cols-3">
          <article v-for="(a, i) in articles" :key="a.title" class="group flex flex-col overflow-hidden rounded-2xl border border-leaf/10 bg-cream shadow-sm transition-shadow hover:shadow-lg">
            <div class="aspect-16/10 overflow-hidden bg-parchment">
              <img :src="a.image_path ? (a.image_path.startsWith('http') ? a.image_path : '/storage/' + a.image_path) : DEFAULT_ARTICLE_IMAGES[i % DEFAULT_ARTICLE_IMAGES.length]" :alt="a.title" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
            </div>
            <div class="flex flex-1 flex-col p-6">
              <span class="w-fit rounded-full bg-sand px-3 py-1 text-[0.7rem] font-semibold uppercase tracking-wide text-leaf">
                {{ a.tag }}
              </span>
              <h3 class="mt-3 font-display text-lg font-semibold leading-snug text-moss">{{ a.title }}</h3>
              <p class="mt-2 flex-1 text-sm leading-relaxed text-bark/70">{{ a.excerpt }}</p>

            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- CTA band -->
    <section class="bg-moss">
      <div class="mx-auto flex max-w-6xl flex-col items-center gap-6 px-6 py-14 text-center md:flex-row md:justify-between md:text-left">
        <div>
          <h2 class="font-display text-2xl font-semibold text-cream md:text-3xl">
            Siap memulai pertanian yang lebih sehat?
          </h2>
          <p class="mt-2 text-cream/80">
            Konsultasikan kebutuhan lahan atau ternak Anda bersama tim kami.
          </p>
        </div>
        <button @click="openModal()" class="inline-flex items-center gap-2 rounded-full bg-sprout px-7 py-3.5 text-sm font-semibold text-bark transition-transform hover:-translate-y-0.5 hover:bg-cream">
          <Icon name="whatsapp" class="h-4 w-4" />
          Hubungi via WhatsApp
        </button>
      </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-bark text-cream/80">
      <div class="mx-auto grid max-w-6xl grid-cols-1 gap-10 px-6 py-16 lg:grid-cols-12">
        <div class="lg:col-span-4">
          <div class="flex items-center gap-2.5">
            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-moss text-cream">
              <Icon name="leaf" class="h-5 w-5" />
            </span>
            <span class="font-display text-lg font-semibold text-cream">Pandawa Kencana</span>
          </div>
          <p class="mt-4 max-w-sm text-sm leading-relaxed text-cream/70">
            CV Pandawa Kencana Multi Farm — produsen pupuk organik dan probiotik untuk pertanian berkelanjutan. Menyuburkan tanah, menumbuhkan harapan.
          </p>
        </div>

        <div class="lg:col-span-2">
          <h4 class="text-sm font-semibold uppercase tracking-widest text-cream">Tautan Cepat</h4>
          <ul class="mt-4 space-y-3 text-sm text-cream/70">
            <li v-for="l in NAV_LINKS" :key="l.href">
              <a :href="l.href" class="transition-colors hover:text-sprout">{{ l.label }}</a>
            </li>
          </ul>
        </div>

        <div class="lg:col-span-3">
          <h4 class="text-sm font-semibold uppercase tracking-widest text-cream">Kontak</h4>
          <ul class="mt-4 space-y-3 text-sm text-cream/70">
            <li class="flex gap-2">
              <Icon name="pin" class="mt-0.5 h-4 w-4 shrink-0 text-sprout" />
              {{ $page.props.settings?.address || 'Jl. Kaliurang KM 20, Desa Cangkringan, Sleman, Yogyakarta' }}
            </li>
            <li>
              <button @click="openModal()" class="inline-flex items-center gap-2 transition-colors hover:text-sprout">
                <Icon name="whatsapp" class="h-4 w-4 text-sprout" />
                {{ $page.props.settings?.whatsapp || '0812-3456-7890' }}
              </button>
            </li>
            <li>
              <a href="mailto:halo@pandawakencana.id" class="inline-flex items-center gap-2 transition-colors hover:text-sprout">
                <Icon name="mail" class="h-4 w-4 text-sprout" />
                halo@pandawakencana.id
              </a>
            </li>
          </ul>
        </div>

        <div class="lg:col-span-3">
          <h4 class="text-sm font-semibold uppercase tracking-widest text-cream">Lokasi Kami</h4>
          <div class="mt-4 flex aspect-4/3 flex-col items-center justify-center gap-2 rounded-xl border border-cream/15 bg-cream/5 text-center text-cream/60">
            <Icon name="pin" class="h-8 w-8 text-sprout" />
            <span class="text-xs">Placeholder Peta Google Maps</span>
            <a href="https://maps.google.com/?q=Cangkringan+Sleman+Yogyakarta" target="_blank" rel="noreferrer" class="text-xs font-semibold text-sprout underline underline-offset-2">
              Buka di Google Maps
            </a>
          </div>
        </div>
      </div>

      <div class="border-t border-cream/10">
        <div class="mx-auto flex max-w-6xl flex-col items-center justify-center gap-2 px-6 py-5 text-center text-xs text-cream/50">
          <span>© 2026 CV Pandawa Kencana Multi Farm. Seluruh hak cipta dilindungi.</span>
        </div>
      </div>
    </footer>

    <!-- Modal Form Pemesanan -->
    <div v-if="showLeadModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-bark/60 backdrop-blur-sm">
      <div class="bg-cream w-full max-w-md rounded-3xl p-8 shadow-xl relative animate-in fade-in zoom-in duration-200">
        <button @click="closeModal()" class="absolute right-6 top-6 text-bark/50 hover:text-moss transition-colors">
          <Icon name="plus" class="w-6 h-6 rotate-45" />
        </button>
        <div class="mb-6">
          <h3 class="font-display text-2xl font-semibold text-moss">Informasi Pemesanan</h3>
          <p class="text-sm text-bark/70 mt-1">Silakan lengkapi form berikut sebelum kami arahkan ke WhatsApp.</p>
        </div>
        <form @submit.prevent="submitLead" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-bark/80 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
            <input v-model="leadForm.name" type="text" required class="w-full rounded-xl border border-leaf/20 bg-white px-4 py-3 text-sm focus:border-moss focus:outline-none focus:ring-1 focus:ring-moss" placeholder="Masukkan nama Anda" />
          </div>
          <div>
            <label class="block text-sm font-medium text-bark/80 mb-1">Nomor WhatsApp <span class="text-red-500">*</span></label>
            <input v-model="leadForm.phone" type="tel" required class="w-full rounded-xl border border-leaf/20 bg-white px-4 py-3 text-sm focus:border-moss focus:outline-none focus:ring-1 focus:ring-moss" placeholder="081234567890" />
          </div>
          <div v-if="leadProductName" class="hidden">
            <input type="hidden" v-model="leadForm.message" />
          </div>
          <!-- Honeypot -->
          <div class="hidden" aria-hidden="true">
            <input v-model="leadForm.company_website" type="text" tabindex="-1" autocomplete="off" />
          </div>
          <button type="submit" :disabled="leadForm.processing" class="w-full mt-4 flex items-center justify-center gap-2 rounded-full bg-moss px-5 py-3.5 font-semibold text-cream transition-colors hover:bg-leaf disabled:opacity-70 disabled:cursor-not-allowed">
            <span v-if="leadForm.processing">Sedang memproses...</span>
            <span v-else class="flex items-center gap-2"><Icon name="whatsapp" class="w-5 h-5" /> Lanjutkan ke WhatsApp</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</template>
