<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineOptions({ layout: AdminLayout });
</script>

<template>
  <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
      <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Artikel Edukasi</h2>
      <p class="text-gray-500 mt-2">Bagikan panduan tani & peternakan untuk pelanggan.</p>
    </div>
    <button class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-medium rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 shadow-md hover:shadow-lg transition-all gap-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
      Tulis Artikel
    </button>
  </div>

  <div class="space-y-4">
    <!-- Article 1 -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50 flex items-center justify-between group hover:shadow-md transition-all">
      <div class="flex items-center gap-6">
        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
        <div>
          <h3 class="text-xl font-bold text-gray-900">Cara Tepat Menggunakan Pupuk Organik Cair</h3>
          <p class="text-gray-500 text-sm mt-1">Pertanian &bull; 12 Sep 2026</p>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <button class="w-12 h-12 rounded-full bg-white border border-gray-200 text-gray-500 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
        </button>
        <button class="w-12 h-12 rounded-full bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        </button>
      </div>
    </div>

    <!-- Article 2 -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50 flex items-center justify-between group hover:shadow-md transition-all">
      <div class="flex items-center gap-6">
        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
        <div>
          <h3 class="text-xl font-bold text-gray-900">Manfaat Probiotik untuk Kesehatan Ternak</h3>
          <p class="text-gray-500 text-sm mt-1">Peternakan &bull; 5 Sep 2026</p>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <button class="w-12 h-12 rounded-full bg-white border border-gray-200 text-gray-500 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
        </button>
        <button class="w-12 h-12 rounded-full bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        </button>
      </div>
    </div>

    <!-- Article 3 -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-emerald-50 flex items-center justify-between group hover:shadow-md transition-all">
      <div class="flex items-center gap-6">
        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
        <div>
          <h3 class="text-xl font-bold text-gray-900">Mengenal Kompos dari Kotoran Kambing</h3>
          <p class="text-gray-500 text-sm mt-1">Pertanian &bull; 28 Agu 2026</p>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <button class="w-12 h-12 rounded-full bg-white border border-gray-200 text-gray-500 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
        </button>
        <button class="w-12 h-12 rounded-full bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        </button>
      </div>
    </div>
  </div>
</template>
