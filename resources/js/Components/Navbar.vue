<template>
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <Link href="/" class="text-2xl font-bold text-gray-900 hover:text-pink-600 transition-colors">
                        🛍️ E-Commerce
                    </Link>
                </div>

                <!-- Navigation principale -->
                <nav class="hidden md:flex items-center space-x-8">
                    <Link 
                        href="/" 
                        class="text-gray-700 hover:text-pink-600 font-medium transition-colors duration-200"
                        :class="{ 'text-pink-600 font-semibold': $page.url === '/' }"
                    >
                        🏠 Accueil
                    </Link>
                    <Link 
                        href="/shop" 
                        class="text-gray-700 hover:text-pink-600 font-medium transition-colors duration-200"
                        :class="{ 'text-pink-600 font-semibold': $page.url === '/shop' }"
                    >
                        🛒 Boutique
                    </Link>
                    
                    <!-- Dropdown Catégories -->
                    <div class="relative" @mouseover="showCategories = true" @mouseleave="showCategories = false">
                        <button class="text-gray-700 hover:text-pink-600 font-medium transition-colors duration-200 flex items-center">
                            📂 Catégories
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div v-show="showCategories" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-10">
                            <Link href="/categories/vetements" class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-50 hover:text-pink-600">👕 Vêtements</Link>
                            <Link href="/categories/electronique" class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-50 hover:text-pink-600">📱 Électronique</Link>
                            <Link href="/categories/maison" class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-50 hover:text-pink-600">🏠 Maison</Link>
                            <Link href="/categories/sport" class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-50 hover:text-pink-600">⚽ Sport</Link>
                            <Link href="/categories/beaute" class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-50 hover:text-pink-600">💄 Beauté</Link>
                        </div>
                    </div>

                    <Link 
                        href="/about" 
                        class="text-gray-700 hover:text-pink-600 font-medium transition-colors duration-200"
                        :class="{ 'text-pink-600 font-semibold': $page.url === '/about' }"
                    >
                        ℹ️ À propos
                    </Link>
                    <Link 
                        href="/contact" 
                        class="text-gray-700 hover:text-pink-600 font-medium transition-colors duration-200"
                        :class="{ 'text-pink-600 font-semibold': $page.url === '/contact' }"
                    >
                        📞 Contact
                    </Link>
                    <Link 
                        href="/offers" 
                        class="text-gray-700 hover:text-pink-600 font-medium transition-colors duration-200"
                        :class="{ 'text-pink-600 font-semibold': $page.url === '/offers' }"
                    >
                        🎁 Offres
                    </Link>
                </nav>

                <!-- Barre de recherche -->
                <div class="hidden lg:flex items-center">
                    <div class="relative">
                        <input 
                            type="text" 
                            v-model="searchQuery"
                            @keyup.enter="performSearch"
                            placeholder="Rechercher des produits..." 
                            class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button 
                            @click="performSearch"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-pink-600 hover:text-pink-800"
                        >
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Panier et Menu mobile -->
                <div class="flex items-center space-x-4">
                    <!-- Panier -->
                    <Link href="/cart" class="relative text-gray-700 hover:text-pink-600 transition-colors">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-pink-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ cartCount }}
                        </span>
                    </Link>

                    <!-- Menu mobile -->
                    <button 
                        @click="showMobileMenu = !showMobileMenu"
                        class="md:hidden text-gray-700 hover:text-pink-600"
                    >
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu mobile -->
            <div v-show="showMobileMenu" class="md:hidden border-t border-gray-200 py-4">
                <div class="flex flex-col space-y-4">
                    <!-- Barre de recherche mobile -->
                    <div class="px-4">
                        <div class="relative">
                            <input 
                                type="text" 
                                v-model="searchQuery"
                                @keyup.enter="performSearch"
                                placeholder="Rechercher..." 
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation mobile -->
                    <nav class="flex flex-col space-y-2 px-4">
                        <Link href="/" class="text-gray-700 hover:text-pink-600 py-2">🏠 Accueil</Link>
                        <Link href="/shop" class="text-gray-700 hover:text-pink-600 py-2">🛒 Boutique</Link>
                        <Link href="/categories" class="text-gray-700 hover:text-pink-600 py-2">📂 Catégories</Link>
                        <Link href="/about" class="text-gray-700 hover:text-pink-600 py-2">ℹ️ À propos</Link>
                        <Link href="/contact" class="text-gray-700 hover:text-pink-600 py-2">📞 Contact</Link>
                        <Link href="/offers" class="text-gray-700 hover:text-pink-600 py-2">🎁 Offres</Link>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    name: 'Navbar',
    components: {
        Link
    },
    data() {
        return {
            searchQuery: '',
            showCategories: false,
            showMobileMenu: false,
            cartCount: 3 // Exemple - à remplacer par la vraie valeur du panier
        }
    },
    methods: {
        performSearch() {
            if (this.searchQuery.trim()) {
                this.$inertia.get('/search', { q: this.searchQuery })
            }
        }
    }
}
</script>
