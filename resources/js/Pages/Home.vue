<template>
    <div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-blue-50">
        <!-- Navbar -->
        <Navbar />

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto">
            <!-- Hero Section -->
            <section class="relative h-screen flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0">
                    <img 
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                        alt="Hero Background" 
                        class="w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                </div>
                <div class="relative z-10 text-center text-white px-4">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
                        Découvrez l'Excellence
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                        Une collection exclusive de produits de qualité pour enrichir votre quotidien
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <Link 
                            href="/shop" 
                            class="bg-white text-gray-900 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg"
                        >
                            🛒 Explorer la Boutique
                        </Link>
                        <Link 
                            href="/offers" 
                            class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105"
                        >
                            🎁 Voir les Offres
                        </Link>
                    </div>
                </div>
            </section>

            <!-- Categories Section -->
            <section class="py-16 px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Catégories Populaires</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Explorez nos collections soigneusement sélectionnées
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <img 
                            src="https://images.unsplash.com/photo-1445205170230-053b83016050?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80" 
                            alt="Mode" 
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="text-2xl font-bold mb-2">👗 Mode</h3>
                            <p class="text-sm opacity-90">Style et élégance</p>
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <img 
                            src="https://images.unsplash.com/photo-1498049794561-7780e7231661?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                            alt="Électronique" 
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="text-2xl font-bold mb-2">📱 Électronique</h3>
                            <p class="text-sm opacity-90">Innovation technologique</p>
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <img 
                            src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2076&q=80" 
                            alt="Maison" 
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="text-2xl font-bold mb-2">🏠 Maison</h3>
                            <p class="text-sm opacity-90">Décoration & ameublement</p>
                        </div>
                    </div>

                    <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <img 
                            src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                            alt="Sport" 
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="text-2xl font-bold mb-2">⚽ Sport</h3>
                            <p class="text-sm opacity-90">Performance & bien-être</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Products -->
            <section class="py-16 px-4 bg-white">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Produits en Vedette</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Découvrez nos produits les plus populaires
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <div v-for="product in products" :key="product.id" class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <img 
                                :src="product.image || 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2099&q=80'" 
                                :alt="product.name" 
                                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                            >
                            <div class="absolute top-4 right-4">
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    -20%
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                {{ product.name }}
                            </h4>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    <svg v-for="i in 5" :key="i" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-600 ml-2">(4.8)</span>
                            </div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-2xl font-bold text-blue-600">{{ product.price }}€</span>
                                <span class="text-gray-400 line-through text-lg">{{ Math.round(product.price * 1.25) }}€</span>
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
                                    class="flex-1 bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-colors font-semibold"
                                >
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="py-16 px-4 bg-gradient-to-r from-blue-50 to-pink-50">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Pourquoi Nous Choisir ?</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Notre engagement envers l'excellence et la satisfaction client
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Livraison Rapide</h3>
                        <p class="text-gray-600">Livraison gratuite en 24h pour toute commande supérieure à 50€</p>
                    </div>
                    
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Garantie Qualité</h3>
                        <p class="text-gray-600">30 jours de garantie satisfait ou remboursé sur tous nos produits</p>
                    </div>
                    
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 109.75 9.75A9.75 9.75 0 0012 2.25z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Support 24/7</h3>
                        <p class="text-gray-600">Notre équipe est disponible 24h/24 et 7j/7 pour vous accompagner</p>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <Footer />
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import Navbar from '../Components/Navbar.vue'
import Footer from '../Components/Footer.vue'

defineProps({
    title: String,
    products: Array
})

const addToCart = (product) => {
    // Logique pour ajouter au panier
    console.log('Ajouter au panier:', product)
}
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>