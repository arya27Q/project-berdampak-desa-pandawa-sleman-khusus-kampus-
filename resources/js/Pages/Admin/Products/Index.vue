
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import debounce from 'lodash/debounce';

defineOptions({ layout: AdminLayout });

const props = defineProps({
    products: Object,
    filters: Object,
});

const search = ref(props.filters.search || '');
const category = ref(props.filters.category || 'Semua');

watch([search, category], debounce(([newSearch, newCategory]) => {
    router.get('/admin/products', { search: newSearch, category: newCategory }, {
        preserveState: true,
        replace: true
    });
}, 300));

const setCategory = (c) => {
    category.value = c;
};
</script>

<template>
  <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
      <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Kelola Produk</h2>
      <p class="text-gray-500 mt-2">Pupuk organik & probiotik unggulan Pandawa Kencana.</p>
    </div>
    <Link href="/admin/products/create" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-medium rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 shadow-md hover:shadow-lg transition-all gap-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
      Tambah Produk Baru
    </Link>
  </div>

  <div class="flex flex-col lg:flex-row gap-4 mb-6">
    <div class="grow relative">
      <input v-model="search" type="text" placeholder="Cari nama produk..." class="w-full pl-5 pr-12 py-3.5 bg-white border border-emerald-50 rounded-2xl shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-700" />
      <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-gray-400">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
      </div>
    </div>
    <div class="flex gap-2">
      <div class="bg-emerald-100/50 p-2 rounded-2xl flex items-center justify-center text-emerald-700 px-3 border border-emerald-100">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
      </div>
      <button @click="setCategory('Semua')" :class="['px-6 py-3.5 rounded-2xl text-sm font-medium shadow-sm transition-colors', category === 'Semua' ? 'bg-emerald-600 text-white' : 'bg-white text-gray-600 hover:text-emerald-700 border border-emerald-50']">Semua</button>
      <button @click="setCategory('Pupuk Organik')" :class="['px-6 py-3.5 rounded-2xl text-sm font-medium shadow-sm transition-colors', category === 'Pupuk Organik' ? 'bg-emerald-600 text-white' : 'bg-white text-gray-600 hover:text-emerald-700 border border-emerald-50']">Pupuk Organik</button>
      <button @click="setCategory('Probiotik Peternakan')" :class="['px-6 py-3.5 rounded-2xl text-sm font-medium shadow-sm transition-colors', category === 'Probiotik Peternakan' ? 'bg-emerald-600 text-white' : 'bg-white text-gray-600 hover:text-emerald-700 border border-emerald-50']">Probiotik Peternakan</button>
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
        <tr v-for="product in products.data" :key="product.id" class="hover:bg-gray-50/50 transition-colors">
          <td class="px-8 py-5 whitespace-nowrap">
            <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100">
              <img :src="product.image_path ? '/storage/' + product.image_path : 'https://images.unsplash.com/photo-1599839619722-39751411ea63?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80'" class="w-full h-full object-cover" />
            </div>
          </td>
          <td class="px-8 py-5">
            <div class="text-sm font-bold text-gray-900">{{ product.name }}</div>
          </td>
          <td class="px-8 py-5 whitespace-nowrap">
            <span :class="[
              'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full',
              product.category.toLowerCase().includes('pupuk') ? 'bg-amber-50 text-amber-700 border border-amber-100' : 'bg-emerald-50 text-emerald-700'
            ]">{{ product.category }}</span>
          </td>
          <td class="px-8 py-5 whitespace-nowrap text-sm font-medium text-gray-900">
            Rp {{ product.price }}
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
              <Link :href="`/admin/products/${product.id}/edit`" class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-500 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
              </Link>
              <button @click="router.delete(`/admin/products/${product.id}`)" class="w-10 h-10 rounded-full bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
              </button>
            </div>
          </td>
        </tr>
        <tr v-if="!products.data.length">
          <td colspan="6" class="px-8 py-10 text-center text-gray-400">Belum ada data produk.</td>
        </tr>
      </tbody>
    </table>
    
    <!-- Pagination -->
    <div class="px-8 py-5 bg-white border-t border-emerald-50 flex items-center justify-between" v-if="products.data.length > 0">
      <p class="text-sm text-gray-500">Menampilkan <span class="font-bold text-gray-900">{{ products.from }}</span> - <span class="font-bold text-gray-900">{{ products.to }}</span> dari <span class="font-bold text-gray-900">{{ products.total }}</span> produk</p>
      <div class="flex gap-1">
        <template v-for="(link, k) in products.links" :key="k">
          <div v-if="!link.url" v-html="link.label.replace('&laquo; Previous', '&laquo;').replace('Next &raquo;', '&raquo;')" class="min-w-[2.5rem] px-3 h-10 rounded-full flex items-center justify-center font-bold shadow-sm transition-colors bg-white border border-emerald-50 text-gray-400 opacity-50 cursor-not-allowed"></div>
          <Link v-else :href="link.url" v-html="link.label.replace('&laquo; Previous', '&laquo;').replace('Next &raquo;', '&raquo;')" :class="['min-w-[2.5rem] px-3 h-10 rounded-full flex items-center justify-center font-bold shadow-sm transition-colors', link.active ? 'bg-emerald-600 text-white shadow-md' : 'bg-white border border-emerald-50 text-gray-600 hover:text-emerald-700 hover:bg-gray-50']" />
        </template>
      </div>
    </div>
  </div>
</template>
