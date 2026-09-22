<template>
  <Head :title="title ? `${title} | Admin Pandawa` : 'Admin Pandawa Kencana'" />

  <div class="min-h-screen bg-[#f8f9fa] flex text-gray-800 font-sans">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-white flex flex-col h-screen sticky top-0 border-r border-gray-100 shrink-0">
      <!-- Logo -->
      <div class="p-6 flex items-center gap-2">
        <Icon name="leaf" class="w-8 h-8 text-emerald-700" />
        <span class="font-display font-bold text-xl text-gray-900 tracking-tight">Pandawa</span>
      </div>

      <!-- Menu -->
      <div class="flex-1 overflow-y-auto py-2 flex flex-col gap-8">
        <div>
          <div class="px-6 mb-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Menu</div>
          <nav class="space-y-1">
            <Link href="/admin/dashboard" :class="['flex items-center gap-3 px-6 py-3 border-l-4 transition-colors mr-4 rounded-r-2xl', $page.url === '/admin/dashboard' ? 'border-emerald-700 text-emerald-800 bg-emerald-50/50 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50']">
              <Icon name="grid" class="w-5 h-5" />
              Dashboard
            </Link>
            <Link href="/admin/products" :class="['flex items-center gap-3 px-6 py-3 border-l-4 transition-colors mr-4 rounded-r-2xl', $page.url.startsWith('/admin/products') ? 'border-emerald-700 text-emerald-800 bg-emerald-50/50 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50']">
              <Icon name="box" class="w-5 h-5" />
              Kelola Produk
            </Link>
            <Link href="/admin/articles" :class="['flex items-center gap-3 px-6 py-3 border-l-4 transition-colors mr-4 rounded-r-2xl', $page.url.startsWith('/admin/articles') ? 'border-emerald-700 text-emerald-800 bg-emerald-50/50 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50']">
              <Icon name="file" class="w-5 h-5" />
              Artikel Edukasi
            </Link>
          </nav>
        </div>
        
        <div>
          <div class="px-6 mb-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">General</div>
          <nav class="space-y-1">
            <Link href="/admin/settings" :class="['flex items-center gap-3 px-6 py-3 border-l-4 transition-colors mr-4 rounded-r-2xl', $page.url.startsWith('/admin/settings') ? 'border-emerald-700 text-emerald-800 bg-emerald-50/50 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50']">
              <Icon name="settings" class="w-5 h-5" />
              Pengaturan Web
            </Link>
            <a href="#" class="flex items-center gap-3 px-6 py-3 border-l-4 border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-colors mr-4 rounded-r-2xl">
              <Icon name="logout" class="w-5 h-5" />
              Logout
            </a>
          </nav>
        </div>
      </div>
      
      <!-- Promo Bottom -->
      <div class="p-6">
        <div class="bg-linear-to-br from-emerald-900 to-emerald-800 rounded-2xl p-5 text-white shadow-lg relative overflow-hidden">
          <div class="relative z-10">
            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mb-3">
              <Icon name="leaf" class="w-4 h-4 text-white" />
            </div>
            <h4 class="font-bold text-sm mb-1">Pandawa Kencana</h4>
            <p class="text-[0.65rem] text-emerald-200 mb-4 leading-relaxed">Kelola produk & artikel lebih mudah di CMS modern.</p>
            <a href="/" target="_blank" class="block w-full py-2 bg-emerald-600 hover:bg-emerald-500 rounded-xl text-center text-xs font-bold transition-colors">Lihat Website</a>
          </div>
          <!-- Deco -->
          <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
          <div class="absolute -left-6 -top-6 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden min-w-0">
      
      <!-- Topbar -->
      <header class="bg-white/80 backdrop-blur-md border-b border-gray-100 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
        <!-- search -->
        <div class="relative">
          <Icon name="search" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" />
          <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 bg-gray-100 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 w-64 md:w-80 text-gray-600 transition-all" />
          <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-1">
            <kbd class="text-[0.6rem] bg-white border border-gray-200 px-1.5 py-0.5 rounded shadow-sm text-gray-400 font-sans">⌘</kbd>
            <kbd class="text-[0.6rem] bg-white border border-gray-200 px-1.5 py-0.5 rounded shadow-sm text-gray-400 font-sans">K</kbd>
          </div>
        </div>
        
        <!-- right side -->
        <div class="flex items-center gap-4">
          <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-gray-50 transition-colors"><Icon name="mail" class="w-5 h-5" /></button>
          <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-gray-50 transition-colors relative">
            <Icon name="bell" class="w-5 h-5" />
            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
          </button>
          
          <div class="w-px h-8 bg-gray-200 mx-2 hidden md:block"></div>
          
          <div class="flex items-center gap-3 cursor-pointer group">
            <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=150&h=150&fit=crop&auto=format" alt="Avatar" class="w-10 h-10 rounded-full border border-gray-200 object-cover" />
            <div class="hidden md:block text-sm">
              <p class="font-bold text-gray-900 group-hover:text-emerald-700 transition-colors">Budi Santoso</p>
              <p class="text-xs text-gray-500">admin@pandawa.id</p>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 overflow-y-auto p-6 md:p-8 lg:p-12 pb-24">
        <slot />
      </main>
      
    </div>
  </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Icon from '@/Components/Icon.vue';

const props = defineProps({
  title: String,
  breadcrumbs: Array
});
</script>
