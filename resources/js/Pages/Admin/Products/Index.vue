<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineOptions({ layout: AdminLayout });
</script>

<template>
  <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
      <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Kelola Produk</h2>
      <p class="text-gray-500 mt-2">Pupuk organik & probiotik unggulan Pandawa Kencana.</p>
    </div>
    <button class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-medium rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 shadow-md hover:shadow-lg transition-all gap-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
      Tambah Produk Baru
    </button>
  </div>

  <div class="flex flex-col lg:flex-row gap-4 mb-6">
    <div class="grow relative">
      <input type="text" placeholder="Cari nama produk..." class="w-full pl-5 pr-12 py-3.5 bg-white border border-emerald-50 rounded-2xl shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-700" />
      <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-gray-400">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
      </div>
    </div>
    <div class="flex gap-2">
      <div class="bg-emerald-100/50 p-2 rounded-2xl flex items-center justify-center text-emerald-700 px-3 border border-emerald-100">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
      </div>
      <button class="px-6 py-3.5 rounded-2xl bg-emerald-600 text-white text-sm font-medium shadow-sm transition-colors">Semua</button>
      <button class="px-6 py-3.5 rounded-2xl bg-white text-gray-600 hover:text-emerald-700 border border-emerald-50 text-sm font-medium shadow-sm transition-colors">Pupuk Organik</button>
      <button class="px-6 py-3.5 rounded-2xl bg-white text-gray-600 hover:text-emerald-700 border border-emerald-50 text-sm font-medium shadow-sm transition-colors">Probiotik Peternakan</button>
    </div>
  </div>

  <div class="bg-white rounded-3xl shadow-sm border border-emerald-50 overflow-hidden">
    <table class="min-w-full divide-y divide-emerald-50">
      <thead class="bg-gray-50/50">
        <tr>
          <th scope="col" class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Foto</th>
          <th scope="col" class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Produk</th>
          <th scope="col" class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
          <th scope="col" class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Harga</th>
          <th scope="col" class="px-8 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
          <th scope="col" class="px-8 py-5 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-emerald-50">
        <!-- Row 1 -->
        <tr class="hover:bg-gray-50/50 transition-colors">
          <td class="px-8 py-5 whitespace-nowrap">
            <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100">
              <img src="https://images.unsplash.com/photo-1599839619722-39751411ea63?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" class="w-full h-full object-cover" />
            </div>
          </td>
          <td class="px-8 py-5">
            <div class="text-sm font-bold text-gray-900">Pupuk Organik Cair Pandawa</div>
          </td>
          <td class="px-8 py-5 whitespace-nowrap">
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-50 text-emerald-700">Pupuk</span>
          </td>
          <td class="px-8 py-5 whitespace-nowrap text-sm font-medium text-gray-900">
            Rp 45.000
          </td>
          <td class="px-8 py-5 whitespace-nowrap">
            <div class="flex items-center gap-3">
              <div class="w-12 h-6 bg-emerald-500 rounded-full relative cursor-pointer shadow-inner">
                <div class="absolute right-1 top-1 bg-white w-4 h-4 rounded-full shadow-sm"></div>
              </div>
              <span class="text-sm font-medium text-emerald-700">Tampil</span>
            </div>
          </td>
          <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
            <div class="flex justify-end gap-2">
              <button class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-500 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
              </button>
              <button class="w-10 h-10 rounded-full bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
              </button>
            </div>
          </td>
        </tr>
        <!-- Row 2 -->
        <tr class="hover:bg-gray-50/50 transition-colors">
          <td class="px-8 py-5 whitespace-nowrap">
            <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100">
              <img src="https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" class="w-full h-full object-cover" />
            </div>
          </td>
          <td class="px-8 py-5">
            <div class="text-sm font-bold text-gray-900">Probiotik Ternak PK-Bio</div>
          </td>
          <td class="px-8 py-5 whitespace-nowrap">
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-50 text-blue-700">Probiotik</span>
          </td>
          <td class="px-8 py-5 whitespace-nowrap text-sm font-medium text-gray-900">
            Rp 60.000
          </td>
          <td class="px-8 py-5 whitespace-nowrap">
            <div class="flex items-center gap-3">
              <div class="w-12 h-6 bg-emerald-500 rounded-full relative cursor-pointer shadow-inner">
                <div class="absolute right-1 top-1 bg-white w-4 h-4 rounded-full shadow-sm"></div>
              </div>
              <span class="text-sm font-medium text-emerald-700">Tampil</span>
            </div>
          </td>
          <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
            <div class="flex justify-end gap-2">
              <button class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-500 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
              </button>
              <button class="w-10 h-10 rounded-full bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
              </button>
            </div>
          </td>
        </tr>
        <!-- Row 3 -->
        <tr class="hover:bg-gray-50/50 transition-colors opacity-75">
          <td class="px-8 py-5 whitespace-nowrap">
            <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100">
              <img src="https://images.unsplash.com/photo-1627844642677-9b48f6e72782?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" class="w-full h-full object-cover" />
            </div>
          </td>
          <td class="px-8 py-5">
            <div class="text-sm font-bold text-gray-900">Pupuk Kompos Kandang Premium</div>
          </td>
          <td class="px-8 py-5 whitespace-nowrap">
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-50 text-emerald-700">Pupuk</span>
          </td>
          <td class="px-8 py-5 whitespace-nowrap text-sm font-medium text-gray-900">
            Rp 30.000
          </td>
          <td class="px-8 py-5 whitespace-nowrap">
            <div class="flex items-center gap-3">
              <div class="w-12 h-6 bg-gray-200 rounded-full relative cursor-pointer shadow-inner">
                <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full shadow-sm"></div>
              </div>
              <span class="text-sm font-medium text-gray-500">Sembunyikan</span>
            </div>
          </td>
          <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
            <div class="flex justify-end gap-2">
              <button class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-500 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
              </button>
              <button class="w-10 h-10 rounded-full bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    
    <!-- Pagination -->
    <div class="px-8 py-5 bg-white border-t border-emerald-50 flex items-center justify-between">
      <p class="text-sm text-gray-500">Menampilkan <span class="font-bold text-gray-900">3</span> dari <span class="font-bold text-gray-900">3</span> produk</p>
      <div class="flex gap-1">
        <button class="w-10 h-10 rounded-full flex items-center justify-center border border-emerald-50 text-gray-400 cursor-not-allowed">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button class="w-10 h-10 rounded-full flex items-center justify-center bg-emerald-600 text-white font-bold shadow-md">1</button>
        <button class="w-10 h-10 rounded-full flex items-center justify-center border border-emerald-50 text-gray-400 cursor-not-allowed">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>
      </div>
    </div>
  </div>
</template>
