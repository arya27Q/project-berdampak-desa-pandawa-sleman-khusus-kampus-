<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Icon from '@/Components/Icon.vue';

defineOptions({ layout: AdminLayout });

defineProps({
    totalProducts: Number,
    totalArticles: Number,
    totalVisits: Number,
    newOrders: Number,
    recentProducts: Array,
    recentArticles: Array
});
</script>

<template>
  <div class="max-w-350 mx-auto">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
      <div>
        <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Dashboard</h2>
        <p class="text-sm text-gray-500 mt-1">Plan, prioritize, and accomplish your tasks with ease.</p>
      </div>

    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
      <!-- Card 1 -->
      <div class="bg-emerald-800 rounded-3xl p-6 text-white relative overflow-hidden group hover:shadow-lg transition-all">
        <div class="flex justify-between items-start mb-4 relative z-10">
          <span class="font-medium text-emerald-100 text-sm">Total Produk</span>
          <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm group-hover:bg-white/30 transition-colors cursor-pointer">
            <Icon name="arrow" class="w-4 h-4 -rotate-45" />
          </div>
        </div>
        <div class="text-4xl font-display font-bold mb-4 relative z-10">{{ totalProducts }}</div>
        <div class="flex items-center gap-2 text-[0.65rem] text-emerald-200 relative z-10 font-medium">
          <span class="bg-white/20 px-1.5 py-0.5 rounded flex items-center gap-1"><Icon name="arrow" class="w-3 h-3 -rotate-90" /> 5</span>
          Increased from last month
        </div>
        <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
      </div>
      
      <!-- Card 2 -->
      <div class="bg-white rounded-3xl p-6 border border-gray-100 group hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
          <span class="font-medium text-gray-900 text-sm">Pesanan Baru</span>
          <div class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 group-hover:text-emerald-700 group-hover:border-emerald-200 transition-colors cursor-pointer">
            <Icon name="arrow" class="w-4 h-4 -rotate-45" />
          </div>
        </div>
        <div class="text-4xl font-display font-bold text-gray-900 mb-4">{{ newOrders }}</div>
        <div class="flex items-center gap-2 text-[0.65rem] text-gray-400 font-medium">
          <span class="bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded flex items-center gap-1"><Icon name="arrow" class="w-3 h-3 -rotate-90" /> 6</span>
          Increased from last month
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-3xl p-6 border border-gray-100 group hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
          <span class="font-medium text-gray-900 text-sm">Total Kunjungan</span>
          <div class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 group-hover:text-emerald-700 group-hover:border-emerald-200 transition-colors cursor-pointer">
            <Icon name="arrow" class="w-4 h-4 -rotate-45" />
          </div>
        </div>
        <div class="text-4xl font-display font-bold text-gray-900 mb-4">{{ totalVisits }}</div>
        <div class="flex items-center gap-2 text-[0.65rem] text-gray-400 font-medium">
          <span class="bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded flex items-center gap-1"><Icon name="arrow" class="w-3 h-3 -rotate-90" /> 2</span>
          Increased from last month
        </div>
      </div>

      <!-- Card 4 -->
      <div class="bg-white rounded-3xl p-6 border border-gray-100 group hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
          <span class="font-medium text-gray-900 text-sm">Artikel Edukasi</span>
          <div class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 group-hover:text-emerald-700 group-hover:border-emerald-200 transition-colors cursor-pointer">
            <Icon name="arrow" class="w-4 h-4 -rotate-45" />
          </div>
        </div>
        <div class="text-4xl font-display font-bold text-gray-900 mb-4">{{ totalArticles }}</div>
        <div class="flex items-center gap-2 text-[0.65rem] text-gray-400 font-medium">
          On Discuss
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
      <!-- Recent Products -->
      <div class="bg-white rounded-3xl p-6 border border-gray-100 flex flex-col">
        <div class="flex items-center justify-between mb-6">
          <h3 class="font-bold text-gray-900">Produk Terbaru</h3>
        </div>
        <div class="space-y-4">
          <div v-for="product in recentProducts" :key="product.id" class="flex items-center justify-between border-b border-gray-50 pb-4 last:border-0 last:pb-0">
            <div class="flex items-center gap-3">
              <img :src="product.image_path ? (product.image_path.startsWith('http') ? product.image_path : '/storage/' + product.image_path) : 'https://picsum.photos/seed/'+product.id+'/150/150'" class="w-12 h-12 rounded-xl border border-gray-100 object-cover" />
              <div>
                <p class="text-sm font-bold text-gray-900 leading-tight mb-0.5">{{ product.name }}</p>
                <p class="text-[0.65rem] text-gray-500 font-medium">{{ product.category }}</p>
              </div>
            </div>
            <span class="px-2 py-1 rounded text-[0.7rem] font-bold bg-emerald-50 text-emerald-700 tracking-wide">Rp {{ product.price }}</span>
          </div>
          <div v-if="!recentProducts.length" class="text-sm text-gray-400 py-4">Belum ada produk.</div>
        </div>
      </div>

      <!-- Recent Articles -->
      <div class="bg-white rounded-3xl p-6 border border-gray-100 flex flex-col">
        <div class="flex items-center justify-between mb-6">
          <h3 class="font-bold text-gray-900">Artikel Edukasi Terbaru</h3>
        </div>
        <div class="space-y-4">
          <div v-for="article in recentArticles" :key="article.id" class="flex items-center justify-between border-b border-gray-50 pb-4 last:border-0 last:pb-0">
            <div class="flex items-center gap-3">
              <img :src="article.image_path ? (article.image_path.startsWith('http') ? article.image_path : '/storage/' + article.image_path) : 'https://picsum.photos/seed/'+article.id+'/150/150'" class="w-12 h-12 rounded-xl border border-gray-100 object-cover" />
              <div>
                <p class="text-sm font-bold text-gray-900 leading-tight mb-0.5">{{ article.title }}</p>
                <p class="text-[0.65rem] text-gray-500 font-medium">{{ article.tag }}</p>
              </div>
            </div>
          </div>
          <div v-if="!recentArticles.length" class="text-sm text-gray-400 py-4">Belum ada artikel.</div>
        </div>
      </div>
    </div>
  </div>
</template>
