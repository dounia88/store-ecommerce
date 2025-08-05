<template>
    <div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-blue-50">
        <!-- Navbar -->
        <Navbar />

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="px-4 py-8">
                <div class="text-center mb-8">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        🛒 Notre Collection
                    </h1>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Découvrez notre sélection exclusive de produits de qualité
                    </p>
                </div>

                <!-- Filters and Search -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Search -->
                        <div class="md:col-span-2">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    v-model="searchQuery"
                                    placeholder="Rechercher des produits..." 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div>
                            <select v-model="selectedCategory" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Toutes les catégories</option>
                                <option value="mode">👗 Mode</option>
                                <option value="electronique">📱 Électronique</option>
                                <option value="maison">🏠 Maison</option>
                                <option value="sport">⚽ Sport</option>
                                <option value="beaute">💄 Beauté</option>
                            </select>
                        </div>

                        <!-- Price Filter -->
                        <div>
                            <select v-model="selectedPrice" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Tous les prix</option>
                                <option value="0-50">0€ - 50€</option>
                                <option value="50-100">50€ - 100€</option>
                                <option value="100-200">100€ - 200€</option>
                                <option value="200+">200€+</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <div v-for="product in filteredProducts" :key="product.id" class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img 
                                :src="product.image || getProductImage(product.category)" 
                                :alt="product.name" 
                                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                            >
                            <div class="absolute top-4 right-4">
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    -{{ Math.floor(Math.random() * 30) + 10 }}%
                                </span>
                            </div>
                            <div class="absolute top-4 left-4">
                                <button @click="toggleFavorite(product)" class="bg-white/80 backdrop-blur-sm p-2 rounded-full hover:bg-white transition-colors">
                                    <svg class="w-5 h-5" :class="product.isFavorite ? 'text-red-500 fill-current' : 'text-gray-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-500">{{ product.category || 'Général' }}</span>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <svg v-for="i in 5" :key="i" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-gray-600 ml-1 text-sm">({{ Math.floor(Math.random() * 200) + 50 }})</span>
                                </div>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors line-clamp-2">
                                {{ product.name }}
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ product.description || 'Produit de qualité exceptionnelle avec un design moderne et des matériaux durables.' }}
                            </p>
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <span class="text-2xl font-bold text-blue-600">{{ product.price }}€</span>
                                    <span class="text-gray-400 line-through text-lg ml-2">{{ Math.round(product.price * 1.25) }}€</span>
                                </div>
                                <span class="text-green-600 text-sm font-semibold">En stock</span>
                            </div>
                            <div class="flex space-x-2">
                                <Link 
                                    :href="`/product/${product.id}`" 
                                    class="flex-1 bg-gray-900 text-white px-4 py-3 rounded-lg text-center hover:bg-gray-800 transition-colors font-semibold"
                                >
                                    Voir détails
                                </Link>
                                <button 
                                    @click="addToCart(product)" 
                                    class="flex-1 bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold flex items-center justify-center"
                                >
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                                    </svg>
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- No Products Message -->
                <div v-if="filteredProducts.length === 0" class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-2">Aucun produit trouvé</h3>
                    <p class="text-gray-600 mb-6">Essayez de modifier vos filtres de recherche</p>
                    <button @click="clearFilters" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Effacer les filtres
                    </button>
                </div>

                <!-- Load More Button -->
                <div v-if="filteredProducts.length > 0" class="text-center mt-12">
                    <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Charger plus de produits
                    </button>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <Footer />
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import Navbar from '../Components/Navbar.vue'
import Footer from '../Components/Footer.vue'

const props = defineProps({
    title: String,
    products: Array
})

const searchQuery = ref('')
const selectedCategory = ref('')
const selectedPrice = ref('')

const filteredProducts = computed(() => {
    let filtered = props.products || []
    
    if (searchQuery.value) {
        filtered = filtered.filter(product => 
            product.name.toLowerCase().includes(searchQuery.value.toLowerCase())
        )
    }
    
    if (selectedCategory.value) {
        filtered = filtered.filter(product => 
            product.category === selectedCategory.value
        )
    }
    
    if (selectedPrice.value) {
        const [min, max] = selectedPrice.value.split('-').map(Number)
        filtered = filtered.filter(product => {
            if (max) {
                return product.price >= min && product.price <= max
            } else {
                return product.price >= min
            }
        })
    }
    
    return filtered
})

const getProductImage = (category) => {
    const images = {
        mode: 'https://images.unsplash.com/photo-1445205170230-053b83016050?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80',
        electronique: 'https://images.unsplash.com/photo-1498049794561-7780e7231661?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
        maison: 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2076&q=80',
        sport: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
        beaute: 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2080&q=80'
    }
    return images[category] || 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2099&q=80'
}

const addToCart = (product) => {
    console.log('Ajouter au panier:', product)
    // Ajouter une notification de succès
    alert(`${product.name} ajouté au panier !`)
}

const toggleFavorite = (product) => {
    product.isFavorite = !product.isFavorite
    console.log('Favori togglé:', product)
}

const clearFilters = () => {
    searchQuery.value = ''
    selectedCategory.value = ''
    selectedPrice.value = ''
}
</script>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style> 