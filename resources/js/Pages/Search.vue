<template>
    <div class="min-h-screen bg-pink-50">
        <!-- Navbar -->
        <Navbar />

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ title }}</h1>
                <p class="text-gray-600">
                    <span v-if="query">
                        Résultats de recherche pour "<strong>{{ query }}</strong>" ({{ results.length }} produits trouvés)
                    </span>
                    <span v-else>
                        Effectuez une recherche pour trouver vos produits
                    </span>
                </p>
            </div>

            <!-- Search Bar -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="flex">
                    <input 
                        type="text" 
                        v-model="searchQuery"
                        @keyup.enter="performSearch"
                        placeholder="Rechercher des produits..." 
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    >
                    <button 
                        @click="performSearch"
                        class="bg-pink-600 text-white px-8 py-3 rounded-r-lg hover:bg-pink-700 transition-colors font-medium"
                    >
                        🔍 Rechercher
                    </button>
                </div>
            </div>

            <!-- Filters -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8" v-if="query">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Filtres</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                            <option value="">Toutes les catégories</option>
                            <option value="vetements">Vêtements</option>
                            <option value="electronique">Électronique</option>
                            <option value="maison">Maison</option>
                            <option value="sport">Sport</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Prix minimum</label>
                        <input 
                            type="number" 
                            placeholder="0€"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500"
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Prix maximum</label>
                        <input 
                            type="number" 
                            placeholder="1000€"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500"
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Trier par</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                            <option value="relevance">Pertinence</option>
                            <option value="price_asc">Prix croissant</option>
                            <option value="price_desc">Prix décroissant</option>
                            <option value="name">Nom A-Z</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Results -->
            <div v-if="query && results.length > 0">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <div 
                        v-for="product in results" 
                        :key="product.id"
                        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow"
                    >
                        <img 
                            src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                            :alt="product.name"
                            class="w-full h-48 object-cover"
                        >
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">{{ product.name }}</h3>
                            <p class="text-2xl font-bold text-pink-600 mb-4">{{ product.price }}€</p>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition-colors text-sm">
                                    🛒 Ajouter au panier
                                </button>
                                <Link 
                                    :href="`/product/${product.id}`"
                                    class="flex-1 bg-gray-200 text-gray-800 py-2 px-4 rounded-lg hover:bg-gray-300 transition-colors text-sm text-center"
                                >
                                    👁️ Voir détails
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No Results -->
            <div v-else-if="query && results.length === 0" class="text-center py-12">
                <div class="text-6xl mb-4">🔍</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Aucun résultat trouvé</h2>
                <p class="text-gray-600 mb-8">
                    Nous n'avons trouvé aucun produit correspondant à votre recherche "{{ query }}".
                </p>
                <div class="space-y-4">
                    <p class="text-gray-600">Suggestions :</p>
                    <ul class="text-gray-600 space-y-2">
                        <li>• Vérifiez l'orthographe de votre recherche</li>
                        <li>• Essayez des mots-clés plus généraux</li>
                        <li>• Utilisez des synonymes</li>
                    </ul>
                </div>
            </div>

            <!-- Popular Searches -->
            <div v-if="!query" class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Recherches populaires</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <button 
                        v-for="term in popularSearches" 
                        :key="term"
                        @click="searchQuery = term; performSearch()"
                        class="bg-pink-100 text-pink-800 py-2 px-4 rounded-lg hover:bg-pink-200 transition-colors text-center"
                    >
                        {{ term }}
                    </button>
                </div>
            </div>

            <!-- Suggested Categories -->
            <div v-if="!query" class="mt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Ou parcourez nos catégories</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <Link 
                        href="/categories/vetements"
                        class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow"
                    >
                        <div class="text-4xl mb-3">👕</div>
                        <h3 class="font-semibold text-gray-900">Vêtements</h3>
                    </Link>
                    <Link 
                        href="/categories/electronique"
                        class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow"
                    >
                        <div class="text-4xl mb-3">📱</div>
                        <h3 class="font-semibold text-gray-900">Électronique</h3>
                    </Link>
                    <Link 
                        href="/categories/maison"
                        class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow"
                    >
                        <div class="text-4xl mb-3">🏠</div>
                        <h3 class="font-semibold text-gray-900">Maison</h3>
                    </Link>
                    <Link 
                        href="/categories/sport"
                        class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow"
                    >
                        <div class="text-4xl mb-3">⚽</div>
                        <h3 class="font-semibold text-gray-900">Sport</h3>
                    </Link>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import Navbar from '../Components/Navbar.vue'
import { ref } from 'vue'

const props = defineProps({
    title: String,
    query: String,
    results: Array
})

const searchQuery = ref(props.query || '')

const popularSearches = [
    'iPhone', 'Nike', 'Samsung', 'Adidas', 
    'PlayStation', 'MacBook', 'Zara', 'H&M'
]

const performSearch = () => {
    if (searchQuery.value.trim()) {
        window.location.href = `/search?q=${encodeURIComponent(searchQuery.value)}`
    }
}
</script>
