<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Icon from '@/Components/Icon.vue';

defineOptions({ layout: AdminLayout });
</script>

<template>
  <div class="max-w-350 mx-auto">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
      <div>
        <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Dashboard</h2>
        <p class="text-sm text-gray-500 mt-1">Plan, prioritize, and accomplish your tasks with ease.</p>
      </div>
      <div class="flex items-center gap-3">
        <button class="px-5 py-2.5 bg-emerald-800 text-white rounded-full font-medium text-sm flex items-center justify-center gap-2 hover:bg-emerald-900 shadow-sm transition-colors">
          <Icon name="plus" class="w-4 h-4" /> Add Project
        </button>
        <button class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-full font-medium text-sm hover:bg-gray-50 shadow-sm transition-colors">
          Import Data
        </button>
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
        <div class="text-4xl font-display font-bold mb-4 relative z-10">24</div>
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
        <div class="text-4xl font-display font-bold text-gray-900 mb-4">10</div>
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
        <div class="text-4xl font-display font-bold text-gray-900 mb-4">12</div>
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
        <div class="text-4xl font-display font-bold text-gray-900 mb-4">2</div>
        <div class="flex items-center gap-2 text-[0.65rem] text-gray-400 font-medium">
          On Discuss
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
      <!-- Left Column -->
      <div class="lg:col-span-8 space-y-5 flex flex-col">
        
        <!-- Analytics Chart -->
        <div class="bg-white rounded-3xl p-6 border border-gray-100 flex-1">
          <h3 class="font-bold text-gray-900 mb-8">Project Analytics</h3>
          <div class="h-40 flex items-end justify-between px-2 sm:px-6 relative">
            <div class="flex flex-col items-center gap-3 flex-1 relative">
              <div class="w-8 sm:w-12 bg-[repeating-linear-gradient(-45deg,transparent,transparent_3px,#e5e7eb_3px,#e5e7eb_6px)] rounded-full h-24"></div>
              <span class="text-xs text-gray-400 font-medium">S</span>
            </div>
            <div class="flex flex-col items-center gap-3 flex-1 relative">
              <div class="w-8 sm:w-12 bg-emerald-700 rounded-full h-32"></div>
              <span class="text-xs text-gray-400 font-medium">M</span>
            </div>
            <div class="flex flex-col items-center gap-3 flex-1 relative">
              <div class="absolute -top-8 bg-gray-100 text-gray-600 text-[0.6rem] font-bold px-2 py-1 rounded-md">74%</div>
              <div class="w-8 sm:w-12 bg-emerald-500 rounded-full h-40 shadow-[0_0_15px_rgba(16,185,129,0.3)]"></div>
              <span class="text-xs text-gray-400 font-medium">T</span>
            </div>
            <div class="flex flex-col items-center gap-3 flex-1 relative">
              <div class="w-8 sm:w-12 bg-emerald-900 rounded-full h-44"></div>
              <span class="text-xs text-gray-400 font-medium">W</span>
            </div>
            <div class="flex flex-col items-center gap-3 flex-1 relative">
              <div class="w-8 sm:w-12 bg-[repeating-linear-gradient(-45deg,transparent,transparent_3px,#e5e7eb_3px,#e5e7eb_6px)] rounded-full h-28"></div>
              <span class="text-xs text-gray-400 font-medium">T</span>
            </div>
            <div class="flex flex-col items-center gap-3 flex-1 relative">
              <div class="w-8 sm:w-12 bg-[repeating-linear-gradient(-45deg,transparent,transparent_3px,#e5e7eb_3px,#e5e7eb_6px)] rounded-full h-20"></div>
              <span class="text-xs text-gray-400 font-medium">F</span>
            </div>
            <div class="flex flex-col items-center gap-3 flex-1 relative">
              <div class="w-8 sm:w-12 bg-[repeating-linear-gradient(-45deg,transparent,transparent_3px,#e5e7eb_3px,#e5e7eb_6px)] rounded-full h-24"></div>
              <span class="text-xs text-gray-400 font-medium">S</span>
            </div>
          </div>
        </div>

        <!-- Team Collaboration -->
        <div class="bg-white rounded-3xl p-6 border border-gray-100 flex-1">
          <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-gray-900">Team Collaboration</h3>
            <button class="px-4 py-1.5 rounded-full border border-gray-200 text-[0.65rem] font-bold text-gray-600 flex items-center gap-1 hover:bg-gray-50 transition-colors">
              <Icon name="plus" class="w-3 h-3" /> Add Member
            </button>
          </div>
          <div class="space-y-5">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150&h=150&fit=crop&auto=format" class="w-10 h-10 rounded-full border border-gray-100 object-cover" />
                <div>
                  <p class="text-sm font-bold text-gray-900 leading-tight mb-0.5">Alexandra Deff</p>
                  <p class="text-[0.65rem] text-gray-500">Working on <span class="font-bold text-gray-700">Github Project Repository</span></p>
                </div>
              </div>
              <span class="px-2 py-1 rounded text-[0.6rem] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100 tracking-wide">Completed</span>
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=150&h=150&fit=crop&auto=format" class="w-10 h-10 rounded-full border border-gray-100 object-cover" />
                <div>
                  <p class="text-sm font-bold text-gray-900 leading-tight mb-0.5">Edwin Adenike</p>
                  <p class="text-[0.65rem] text-gray-500">Working on <span class="font-bold text-gray-700">Integrate User Authentication System</span></p>
                </div>
              </div>
              <span class="px-2 py-1 rounded text-[0.6rem] font-bold bg-amber-50 text-amber-600 border border-amber-100 tracking-wide">In Progress</span>
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&h=150&fit=crop&auto=format" class="w-10 h-10 rounded-full border border-gray-100 object-cover" />
                <div>
                  <p class="text-sm font-bold text-gray-900 leading-tight mb-0.5">David Oshodi</p>
                  <p class="text-[0.65rem] text-gray-500">Working on <span class="font-bold text-gray-700">Responsive Layout for Homepage</span></p>
                </div>
              </div>
              <span class="px-2 py-1 rounded text-[0.6rem] font-bold bg-red-50 text-red-600 border border-red-100 tracking-wide">Pending</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="lg:col-span-4 space-y-5 flex flex-col">
        
        <!-- Reminders -->
        <div class="bg-white rounded-3xl p-6 border border-gray-100 flex-1">
          <h3 class="font-bold text-gray-900 mb-6">Reminders</h3>
          <h4 class="text-xl font-display font-semibold text-emerald-900 leading-tight">Meeting with Arc<br>Company</h4>
          <p class="text-[0.7rem] font-medium text-gray-400 mt-2 mb-6">Time : 02.00 pm - 04.00 pm</p>
          <button class="w-full py-3 bg-emerald-800 text-white rounded-xl text-sm font-semibold flex items-center justify-center gap-2 hover:bg-emerald-900 transition-colors shadow-sm">
            <Icon name="file" class="w-4 h-4" /> Start Meeting
          </button>
        </div>

        <!-- Project Progress -->
        <div class="bg-white rounded-3xl p-6 border border-gray-100 flex-1 relative flex flex-col justify-center">
          <h3 class="font-bold text-gray-900 mb-6 absolute top-6 left-6">Project Progress</h3>
          
          <div class="mt-8 flex justify-center">
            <div class="relative w-48 h-24 overflow-hidden">
               <div class="w-48 h-48 rounded-full border-24 border-emerald-800 absolute top-0 left-0 border-b-emerald-800 border-l-emerald-800 border-t-emerald-500 border-r-[repeating-linear-gradient(-45deg,transparent,transparent_4px,#e5e7eb_4px,#e5e7eb_8px)] rotate-45"></div>
            </div>
          </div>
          
          <div class="text-center -mt-2.5 relative z-10 mb-4">
            <p class="text-4xl font-display font-bold text-gray-900">41%</p>
            <p class="text-[0.6rem] text-gray-500 font-bold tracking-wider mt-1">Project Ended</p>
          </div>

          <div class="flex items-center justify-center gap-3 mt-2 text-[0.65rem] font-bold text-gray-500">
            <div class="flex items-center gap-1"><div class="w-2.5 h-2.5 rounded-full bg-emerald-800"></div>Completed</div>
            <div class="flex items-center gap-1"><div class="w-2.5 h-2.5 rounded-full bg-emerald-500"></div>In Progress</div>
            <div class="flex items-center gap-1"><div class="w-2.5 h-2.5 rounded-full bg-[repeating-linear-gradient(-45deg,transparent,transparent_2px,#d1d5db_2px,#d1d5db_4px)]"></div>Pending</div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</template>
