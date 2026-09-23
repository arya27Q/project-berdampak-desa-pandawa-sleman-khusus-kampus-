<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router } from '@inertiajs/vue3';

defineOptions({ layout: AdminLayout });

defineProps({
    articles: Object
});

const DEFAULT_ARTICLE_IMAGES = [
  'https://images.unsplash.com/photo-1592982537447-6f296d0ba967?w=150&h=150&fit=crop&auto=format',
  'https://images.unsplash.com/photo-1586771107445-d3af9e173c52?w=150&h=150&fit=crop&auto=format',
  'https://images.unsplash.com/photo-1530836369250-ef71a3f5e43d?w=150&h=150&fit=crop&auto=format',
  'https://images.unsplash.com/photo-1585437812513-4338e932b1ba?w=150&h=150&fit=crop&auto=format',
  'https://images.unsplash.com/photo-1620675506518-3df066bb2b30?w=150&h=150&fit=crop&auto=format'
];
</script>

<template>
  <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
      <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Artikel Edukasi</h2>
      <p class="text-gray-500 mt-2">Bagikan panduan tani & peternakan untuk pelanggan.</p>
    </div>
    <Link href="/admin/articles/create" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-medium rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 shadow-md hover:shadow-lg transition-all gap-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
      Tulis Artikel
    </Link>
  </div>

  <div class="space-y-4">
    <div v-for="(article, i) in articles.data" :key="article.id" class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50 flex items-center justify-between group hover:shadow-md transition-all">
      <div class="flex items-center gap-6">
        <div class="w-14 h-14 rounded-2xl overflow-hidden bg-emerald-50">
           <img :src="article.image_path ? (article.image_path.startsWith('http') ? article.image_path : '/storage/' + article.image_path) : DEFAULT_ARTICLE_IMAGES[i % DEFAULT_ARTICLE_IMAGES.length]" class="w-full h-full object-cover" />
        </div>
        <div>
          <h3 class="text-xl font-bold text-gray-900">{{ article.title }}</h3>
          <p class="text-gray-500 text-sm mt-1">{{ article.tag }}</p>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <Link :href="`/admin/articles/${article.id}/edit`" class="w-12 h-12 rounded-full bg-white border border-gray-200 text-gray-500 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
        </Link>
        <button @click="router.delete(`/admin/articles/${article.id}`)" class="w-12 h-12 rounded-full bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        </button>
      </div>
    </div>
    <div v-if="!articles.data.length" class="text-center py-10 text-gray-400">Belum ada artikel.</div>


  </div>
</template>
