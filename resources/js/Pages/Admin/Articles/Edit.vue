<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';

defineOptions({ layout: AdminLayout });

const props = defineProps({
    article: Object,
});

const form = useForm({
    title: props.article.title || '',
    excerpt: props.article.excerpt || '',
    content: props.article.content || '',
    tag: props.article.tag || 'Edukasi',
    image: null,
    _method: 'PUT',
});

const imagePreview = ref(props.article.image_path ? '/storage/' + props.article.image_path : null);

const handleImageUpload = (e) => {
    const file = e.target.files[0];
    if (file) {
        form.image = file;
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

const submit = () => {
    form.post(`/admin-pandawa/articles/${props.article.id}`, {
        preserveScroll: true,
    });
};
</script>

<template>
  <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
      <Link href="/admin-pandawa/articles" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium flex items-center gap-2 mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Kelola Artikel
      </Link>
      <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Edit Artikel</h2>
      <p class="text-gray-500 mt-2">Ubah informasi untuk artikel edukasi.</p>
    </div>
    <button @click="router.delete(`/admin-pandawa/articles/${article.id}`)" class="inline-flex items-center justify-center px-6 py-3 border border-red-100 text-sm font-medium rounded-xl text-red-600 bg-red-50 hover:bg-red-100 shadow-sm transition-all gap-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
      Hapus Artikel
    </button>
  </div>

  <div class="bg-white rounded-3xl shadow-sm border border-emerald-50 overflow-hidden max-w-4xl">
    <form @submit.prevent="submit" class="p-8 space-y-6">
      
      <div class="grid grid-cols-1 gap-6">
        <!-- Judul Artikel -->
        <div class="space-y-2">
          <label class="block text-sm font-bold text-gray-700">Judul Artikel</label>
          <input v-model="form.title" type="text" placeholder="Masukkan judul artikel..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-700 transition-all" required />
          <p v-if="form.errors.title" class="text-red-500 text-xs">{{ form.errors.title }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Tag / Kategori -->
          <div class="space-y-2">
            <label class="block text-sm font-bold text-gray-700">Tag / Kategori</label>
            <input v-model="form.tag" type="text" placeholder="Misal: Edukasi, Tips, Panduan" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-700 transition-all" required />
            <p v-if="form.errors.tag" class="text-red-500 text-xs">{{ form.errors.tag }}</p>
          </div>
        </div>

        <!-- Excerpt -->
        <div class="space-y-2">
          <label class="block text-sm font-bold text-gray-700">Ringkasan (Excerpt)</label>
          <textarea v-model="form.excerpt" rows="2" placeholder="Tuliskan ringkasan singkat artikel..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-700 transition-all"></textarea>
          <p v-if="form.errors.excerpt" class="text-red-500 text-xs">{{ form.errors.excerpt }}</p>
        </div>

        <!-- Content -->
        <div class="space-y-2">
          <label class="block text-sm font-bold text-gray-700">Isi Artikel</label>
          <textarea v-model="form.content" rows="10" placeholder="Tuliskan isi artikel edukasi di sini..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-700 transition-all" required></textarea>
          <p v-if="form.errors.content" class="text-red-500 text-xs">{{ form.errors.content }}</p>
        </div>

        <!-- Foto -->
        <div class="space-y-2">
          <label class="block text-sm font-bold text-gray-700">Gambar Cover (Biarkan kosong jika tidak ingin mengubah)</label>
          <div class="mt-2 flex justify-center rounded-xl border border-dashed border-gray-300 px-6 py-10 bg-gray-50 hover:bg-emerald-50 hover:border-emerald-300 transition-all cursor-pointer relative overflow-hidden group">
            <input type="file" @change="handleImageUpload" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*" />
            <div class="text-center" v-if="!imagePreview">
              <svg class="mx-auto h-12 w-12 text-gray-300 group-hover:text-emerald-500 transition-colors" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600 justify-center">
                <span class="relative rounded-md font-semibold text-emerald-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-emerald-600 focus-within:ring-offset-2 hover:text-emerald-500">
                  <span>Upload a file</span>
                </span>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs leading-5 text-gray-500">PNG, JPG, GIF up to 2MB</p>
            </div>
            <div v-else class="relative w-full max-w-sm h-48 rounded-lg overflow-hidden border border-gray-200">
              <img :src="imagePreview" class="w-full h-full object-cover" />
              <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                <p class="text-white text-sm font-bold">Ganti Foto</p>
              </div>
            </div>
          </div>
          <p v-if="form.errors.image" class="text-red-500 text-xs">{{ form.errors.image }}</p>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="pt-6 border-t border-gray-100 flex justify-end gap-3">
        <Link href="/admin-pandawa/articles" class="px-6 py-3 border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 transition-colors">Batal</Link>
        <button type="submit" :disabled="form.processing" class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-md transition-all disabled:opacity-50">
          Simpan Perubahan
        </button>
      </div>

    </form>
  </div>
</template>
