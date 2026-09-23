<template>
  <Head :title="title ? `${title} | Admin Pandawa` : 'Admin Pandawa Kencana'" />

  <div class="min-h-screen bg-[#f8f9fa] flex text-gray-800 font-sans p-4 lg:p-6 gap-4 lg:gap-6">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-white flex flex-col h-[calc(100vh-2rem)] lg:h-[calc(100vh-3rem)] sticky top-4 lg:top-6 rounded-3xl shadow-sm border border-gray-100 shrink-0 hidden md:flex overflow-hidden">
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
            <Link href="/admin-pandawa/dashboard" :class="['flex items-center gap-3 px-6 py-3 border-l-4 transition-colors mr-4 rounded-r-2xl', $page.url === '/admin-pandawa/dashboard' ? 'border-emerald-700 text-emerald-800 bg-emerald-50/50 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50']">
              <Icon name="grid" class="w-5 h-5" />
              Dashboard
            </Link>
            <Link href="/admin-pandawa/products" :class="['flex items-center gap-3 px-6 py-3 border-l-4 transition-colors mr-4 rounded-r-2xl', $page.url.startsWith('/admin-pandawa/products') ? 'border-emerald-700 text-emerald-800 bg-emerald-50/50 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50']">
              <Icon name="box" class="w-5 h-5" />
              Kelola Produk
            </Link>
            <Link href="/admin-pandawa/articles" :class="['flex items-center gap-3 px-6 py-3 border-l-4 transition-colors mr-4 rounded-r-2xl', $page.url.startsWith('/admin-pandawa/articles') ? 'border-emerald-700 text-emerald-800 bg-emerald-50/50 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50']">
              <Icon name="file" class="w-5 h-5" />
              Artikel Edukasi
            </Link>
          </nav>
        </div>
        
        <div>
          <div class="px-6 mb-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">General</div>
          <nav class="space-y-1">
            <Link href="/admin-pandawa/settings" :class="['flex items-center gap-3 px-6 py-3 border-l-4 transition-colors mr-4 rounded-r-2xl', $page.url.startsWith('/admin-pandawa/settings') ? 'border-emerald-700 text-emerald-800 bg-emerald-50/50 font-semibold' : 'border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50']">
              <Icon name="settings" class="w-5 h-5" />
              Pengaturan Web
            </Link>
            <Link method="post" href="/admin-pandawa/logout" as="button" class="w-full text-left flex items-center gap-3 px-6 py-3 border-l-4 border-transparent text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-colors mr-4 rounded-r-2xl">
              <Icon name="logout" class="w-5 h-5" />
              Logout
            </Link>
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
    <div class="flex-1 flex flex-col h-[calc(100vh-2rem)] lg:h-[calc(100vh-3rem)] overflow-hidden min-w-0 gap-4 lg:gap-6">
      
      <!-- Topbar -->
      <header class="bg-white/80 backdrop-blur-md rounded-3xl border border-gray-100 shadow-sm px-6 lg:px-8 py-4 flex items-center justify-between shrink-0 z-10">
        
        <!-- left side -->
        <div>
          <h1 class="text-lg font-bold text-gray-800">{{ title || 'Panel Admin' }}</h1>
          <p class="text-xs text-gray-500">{{ new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) }}</p>
        </div>
        
        <!-- right side -->
        <div class="flex items-center gap-4">
          
          <div class="flex items-center gap-3 cursor-pointer group">
            <div class="w-10 h-10 rounded-full border border-gray-200 bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold">
              {{ $page.props.auth?.user?.name?.charAt(0) || 'A' }}
            </div>
            <div class="hidden md:block text-sm">
              <p class="font-bold text-gray-900 group-hover:text-emerald-700 transition-colors">{{ $page.props.auth?.user?.name || 'Admin' }}</p>
              <p class="text-xs text-gray-500">{{ $page.props.auth?.user?.email || 'admin@pandawa.id' }}</p>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 overflow-y-auto pb-24 pr-2">
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
