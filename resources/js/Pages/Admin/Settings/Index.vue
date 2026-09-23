<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';

defineOptions({ layout: AdminLayout });

const props = defineProps({
  settings: Object
});

const form = useForm({
  headline: props.settings.headline || 'Pupuk Organik & Probiotik Berkualitas untuk Panen Melimpah',
  whatsapp: props.settings.whatsapp || '0812-3456-7890',
  address: props.settings.address || 'Jl. Kaliurang KM 20, Desa Cangkringan, Sleman, Yogyakarta'
});

const submit = () => {
  form.post('/admin/settings');
};
</script>

<template>
  <div class="mb-8">
    <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Pengaturan Web</h2>
    <p class="text-gray-500 mt-2">Ubah konten yang tampil di landing page Pandawa Kencana.</p>
  </div>

  <div class="bg-white rounded-3xl p-8 shadow-sm border border-emerald-50 max-w-3xl">
    <div v-if="$page.props.flash.success" class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-medium">
      {{ $page.props.flash.success }}
    </div>

    <form class="space-y-8" @submit.prevent="submit">
      
      <!-- Headline -->
      <div>
        <label class="block text-sm font-bold text-gray-900 mb-2">Teks Headline Beranda</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-emerald-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
          </div>
          <input type="text" v-model="form.headline" class="block w-full pl-12 pr-4 py-4 bg-gray-50 border border-transparent rounded-2xl text-gray-900 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 outline-none transition-all" />
        </div>
      </div>

      <!-- WhatsApp -->
      <div>
        <label class="block text-sm font-bold text-gray-900 mb-2">Nomor WhatsApp Pemesanan (Click-to-Chat)</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-emerald-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
          </div>
          <input type="text" v-model="form.whatsapp" class="block w-full pl-12 pr-4 py-4 bg-gray-50 border border-transparent rounded-2xl text-gray-900 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 outline-none transition-all" />
        </div>
        <p class="mt-2 text-xs text-gray-400">Pastikan format angka diawali 08.. (misal: 081234567890)</p>
      </div>

      <!-- Address -->
      <div>
        <label class="block text-sm font-bold text-gray-900 mb-2">Alamat Lengkap CV</label>
        <div class="relative">
          <div class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none text-emerald-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          </div>
          <textarea rows="3" v-model="form.address" class="block w-full pl-12 pr-4 py-4 bg-gray-50 border border-transparent rounded-2xl text-gray-900 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 outline-none transition-all resize-none"></textarea>
        </div>
      </div>

      <div class="pt-4 flex items-center gap-4">
        <button type="submit" :disabled="form.processing" class="px-8 py-3.5 border border-transparent text-sm font-medium rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 shadow-md hover:shadow-lg transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 disabled:opacity-50">
          {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
        </button>
      </div>
    </form>
  </div>
</template>
