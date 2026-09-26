<script setup>
defineProps({
    modelValue: String,
    label: String,
    placeholder: String,
    error: String,
    rows: { type: [String, Number], default: 3 },
    required: { type: Boolean, default: false }
});
defineEmits(['update:modelValue']);
</script>

<template>
  <div class="space-y-2">
    <label class="block text-sm font-bold text-gray-700">{{ label }}</label>
    <textarea 
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      :rows="rows" 
      :placeholder="placeholder" 
      class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-700 transition-all"
      :required="required"
    ></textarea>
    <p v-if="error" class="text-red-500 text-xs">{{ error }}</p>
  </div>
</template>
