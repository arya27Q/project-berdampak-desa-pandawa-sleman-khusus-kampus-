<script setup>
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.post('/admin-pandawa/login', {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-900 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
        <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] bg-emerald-600 rounded-full blur-[120px] opacity-20"></div>
        <div class="absolute -bottom-[20%] -right-[10%] w-[50%] h-[50%] bg-teal-600 rounded-full blur-[120px] opacity-20"></div>

        <!-- Login Card -->
        <div class="w-full max-w-md p-8 bg-gray-800/60 backdrop-blur-xl border border-gray-700/50 rounded-2xl shadow-2xl relative z-10">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Welcome Back</h1>
                <p class="text-gray-400">Sign in to the Pandawa Kencana Admin Panel</p>
            </div>

            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                    <input 
                        id="email" 
                        type="email" 
                        v-model="form.email" 
                        required 
                        class="w-full px-4 py-3 bg-gray-900/50 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
                        placeholder="admin@example.com"
                    />
                    <div v-if="form.errors.email" class="text-red-400 text-sm mt-2">{{ form.errors.email }}</div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input 
                        id="password" 
                        type="password" 
                        v-model="form.password" 
                        required 
                        class="w-full px-4 py-3 bg-gray-900/50 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
                        placeholder="••••••••"
                    />
                    <div v-if="form.errors.password" class="text-red-400 text-sm mt-2">{{ form.errors.password }}</div>
                </div>

                <button 
                    type="submit" 
                    :disabled="form.processing"
                    class="w-full py-3 px-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white rounded-lg font-semibold shadow-lg transform transition-all active:scale-95 disabled:opacity-70 disabled:cursor-not-allowed mt-4"
                >
                    <span v-if="form.processing">Signing in...</span>
                    <span v-else>Sign In</span>
                </button>
            </form>
        </div>
    </div>
</template>
