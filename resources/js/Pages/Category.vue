<template>
    <div class="min-h-screen bg-pink-50">
        <!-- Navbar -->
        <Navbar />

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <!-- Category Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ title }}</h1>
                <p class="text-xl text-gray-600">Découvrez notre sélection {{ getCategoryName(category) }}</p>
            </div>

            <!-- Category Banner -->
            <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg shadow-lg p-8 text-white text-center mb-12">
                <div class="text-6xl mb-4">{{ getCategoryIcon(category) }}</div>
                <h2 class="text-3xl font-bold mb-4">{{ getCategoryName(category) }}</h2>
                <p class="text-lg opacity-90">{{ getCategoryDescription(category) }}</p>
            </div>

            <!-- Filters and Sorting -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700 font-medium">Filtres :</span>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                            <option value="">Prix</option>
                            <option value="0-50">0€ - 50€</option>
                            <option value="50-100">50€ - 100€</option>
                            <option value="100-200">100€ - 200€</option>
                            <option value="200+">200€+</option>
                        </select>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                            <option value="">Marque</option>
                            <option value="nike">Nike</option>
                            <option value="adidas">Adidas</option>
                            <option value="samsung">Samsung</option>
                            <option value="apple">Apple</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700 font-medium">Trier par :</span>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                            <option value="featured">Mis en avant</option>
                            <option value="price_asc">Prix croissant</option>
                            <option value="price_desc">Prix décroissant</option>
                            <option value="name">Nom A-Z</option>
                            <option value="newest">Plus récents</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
                <div 
                    v-for="product in products" 
                    :key="product.id"
                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow group"
                >
                    <div class="relative">
                        <img 
                            :src="getProductImage(category)"
                            :alt="product.name"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                        >
                        <div class="absolute top-2 right-2">
                            <button class="bg-white p-2 rounded-full shadow-md hover:bg-pink-50 transition-colors">
                                ❤️
                            </button>
                        </div>
                        <div class="absolute top-2 left-2 bg-pink-600 text-white px-2 py-1 rounded text-sm font-medium">
                            Nouveau
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">{{ product.name }}</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(4.5)</span>
                        </div>
                        <p class="text-2xl font-bold text-pink-600 mb-4">{{ product.price }}€</p>
                        <div class="flex space-x-2">
                            <button 
                                @click="addToCart(product)"
                                class="flex-1 bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition-colors text-sm font-medium"
                            >
                                🛒 Ajouter
                            </button>
                            <Link 
                                :href="`/product/${product.id}`"
                                class="flex-1 bg-gray-200 text-gray-800 py-2 px-4 rounded-lg hover:bg-gray-300 transition-colors text-sm text-center font-medium"
                            >
                                👁️ Voir
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center">
                <button class="bg-pink-600 text-white px-8 py-3 rounded-lg hover:bg-pink-700 transition-colors font-medium">
                    Charger plus de produits
                </button>
            </div>

            <!-- Category Info -->
            <div class="mt-16 bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">À propos de {{ getCategoryName(category) }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-gray-600 mb-4">{{ getCategoryLongDescription(category) }}</p>
                        <ul class="space-y-2 text-gray-600">
                            <li>✓ Livraison gratuite dès 50€</li>
                            <li>✓ Retour gratuit sous 30 jours</li>
                            <li>✓ Garantie satisfaction</li>
                            <li>✓ Service client 7j/7</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Marques populaires</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div 
                                v-for="brand in getCategoryBrands(category)" 
                                :key="brand"
                                class="bg-gray-100 p-3 rounded-lg text-center text-gray-700 hover:bg-pink-50 hover:text-pink-600 transition-colors cursor-pointer"
                            >
                                {{ brand }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import Navbar from '../Components/Navbar.vue'

defineProps({
    title: String,
    category: String,
    products: Array
})

const getCategoryName = (category) => {
    const names = {
        'vetements': 'de vêtements',
        'electronique': 'd\'électronique',
        'maison': 'pour la maison',
        'sport': 'de sport',
        'beaute': 'de beauté'
    }
    return names[category] || category
}

const getCategoryIcon = (category) => {
    const icons = {
        'vetements': '👕',
        'electronique': '📱',
        'maison': '🏠',
        'sport': '⚽',
        'beaute': '💄'
    }
    return icons[category] || '🛍️'
}

const getCategoryDescription = (category) => {
    const descriptions = {
        'vetements': 'Mode et style pour tous les goûts',
        'electronique': 'Les dernières technologies à portée de main',
        'maison': 'Tout pour embellir votre intérieur',
        'sport': 'Équipements pour tous vos sports favoris',
        'beaute': 'Produits de beauté et soins personnels'
    }
    return descriptions[category] || 'Découvrez notre sélection'
}

const getCategoryLongDescription = (category) => {
    const descriptions = {
        'vetements': 'Découvrez notre large gamme de vêtements pour homme, femme et enfant. Des dernières tendances aux classiques intemporels, trouvez votre style parmi nos collections soigneusement sélectionnées.',
        'electronique': 'Explorez notre univers high-tech avec les derniers smartphones, ordinateurs, accessoires et gadgets électroniques. Qualité et innovation garanties.',
        'maison': 'Transformez votre intérieur avec notre sélection déco, mobilier et accessoires pour la maison. Créez un espace qui vous ressemble.',
        'sport': 'Équipez-vous pour tous vos sports avec notre gamme complète d\'articles de sport, fitness et outdoor. Performance et confort assurés.',
        'beaute': 'Prenez soin de vous avec notre sélection de produits cosmétiques, parfums et soins. Beauté et bien-être au quotidien.'
    }
    return descriptions[category] || 'Une sélection de qualité vous attend.'
}

const getCategoryBrands = (category) => {
    const brands = {
        'vetements': ['Zara', 'H&M', 'Nike', 'Adidas'],
        'electronique': ['Apple', 'Samsung', 'Sony', 'LG'],
        'maison': ['IKEA', 'Maisons du Monde', 'Leroy Merlin', 'Conforama'],
        'sport': ['Nike', 'Adidas', 'Decathlon', 'Puma'],
        'beaute': ['L\'Oréal', 'Sephora', 'Yves Rocher', 'Nivea']
    }
    return brands[category] || ['Marque 1', 'Marque 2', 'Marque 3', 'Marque 4']
}

const getProductImage = (category) => {
    const images = {
        'vetements': 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        'electronique': 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        'maison': 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        'sport': 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80',
        'beaute': 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80'
    }
    return images[category] || 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80'
}

const addToCart = (product) => {
    console.log('Ajouter au panier:', product)
    alert(`${product.name} ajouté au panier !`)
}
</script>
