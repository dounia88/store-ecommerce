<template>
    <div class="min-h-screen bg-pink-50">
        <!-- Navbar -->
        <Navbar />

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ title }}</h1>
                <p class="text-xl text-gray-600">Ne manquez pas nos offres exceptionnelles !</p>
            </div>

            <!-- Featured Offers -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div 
                    v-for="offer in offers" 
                    :key="offer.id"
                    class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg shadow-lg p-8 text-white relative overflow-hidden"
                >
                    <div class="absolute top-0 right-0 bg-yellow-400 text-gray-900 px-4 py-2 rounded-bl-lg font-bold">
                        {{ offer.discount }}
                    </div>
                    <h2 class="text-3xl font-bold mb-4">{{ offer.title }}</h2>
                    <p class="text-lg mb-6 opacity-90">{{ offer.description }}</p>
                    <Link 
                        href="/shop" 
                        class="inline-block bg-white text-pink-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition-colors"
                    >
                        🛒 Voir les produits
                    </Link>
                </div>
            </div>

            <!-- Categories on Sale -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Catégories en Promotion</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="text-4xl mb-3">👕</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Vêtements</h3>
                        <p class="text-pink-600 font-bold">Jusqu'à -40%</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="text-4xl mb-3">📱</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Électronique</h3>
                        <p class="text-pink-600 font-bold">Jusqu'à -30%</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="text-4xl mb-3">🏠</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Maison</h3>
                        <p class="text-pink-600 font-bold">Jusqu'à -25%</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                        <div class="text-4xl mb-3">💄</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Beauté</h3>
                        <p class="text-pink-600 font-bold">Jusqu'à -35%</p>
                    </div>
                </div>
            </div>

            <!-- Flash Sales -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">⚡ Ventes Flash</h2>
                    <p class="text-gray-600">Offres limitées dans le temps !</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="border border-gray-200 rounded-lg p-6 text-center">
                        <div class="bg-red-100 text-red-800 text-sm font-bold px-3 py-1 rounded-full inline-block mb-4">
                            Expire dans 2h
                        </div>
                        <img 
                            src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                            alt="Produit flash" 
                            class="w-full h-48 object-cover rounded-lg mb-4"
                        >
                        <h3 class="font-semibold text-gray-900 mb-2">Montre Connectée</h3>
                        <div class="flex items-center justify-center space-x-2 mb-4">
                            <span class="text-2xl font-bold text-pink-600">89€</span>
                            <span class="text-lg text-gray-500 line-through">149€</span>
                        </div>
                        <button class="w-full bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition-colors">
                            Acheter maintenant
                        </button>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-6 text-center">
                        <div class="bg-red-100 text-red-800 text-sm font-bold px-3 py-1 rounded-full inline-block mb-4">
                            Expire dans 5h
                        </div>
                        <img 
                            src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                            alt="Produit flash" 
                            class="w-full h-48 object-cover rounded-lg mb-4"
                        >
                        <h3 class="font-semibold text-gray-900 mb-2">Baskets Sport</h3>
                        <div class="flex items-center justify-center space-x-2 mb-4">
                            <span class="text-2xl font-bold text-pink-600">59€</span>
                            <span class="text-lg text-gray-500 line-through">99€</span>
                        </div>
                        <button class="w-full bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition-colors">
                            Acheter maintenant
                        </button>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-6 text-center">
                        <div class="bg-red-100 text-red-800 text-sm font-bold px-3 py-1 rounded-full inline-block mb-4">
                            Expire dans 1h
                        </div>
                        <img 
                            src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                            alt="Produit flash" 
                            class="w-full h-48 object-cover rounded-lg mb-4"
                        >
                        <h3 class="font-semibold text-gray-900 mb-2">Casque Audio</h3>
                        <div class="flex items-center justify-center space-x-2 mb-4">
                            <span class="text-2xl font-bold text-pink-600">39€</span>
                            <span class="text-lg text-gray-500 line-through">79€</span>
                        </div>
                        <button class="w-full bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition-colors">
                            Acheter maintenant
                        </button>
                    </div>
                </div>
            </div>

            <!-- Newsletter Signup -->
            <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg shadow-lg p-8 text-white text-center">
                <h2 class="text-3xl font-bold mb-4">📧 Ne manquez aucune offre !</h2>
                <p class="text-lg mb-6 opacity-90">
                    Inscrivez-vous à notre newsletter pour recevoir nos meilleures offres en avant-première
                </p>
                <div class="max-w-md mx-auto flex">
                    <input 
                        type="email" 
                        placeholder="Votre adresse email"
                        class="flex-1 px-4 py-3 rounded-l-lg text-gray-900 focus:outline-none"
                    >
                    <button class="bg-white text-pink-600 px-6 py-3 rounded-r-lg font-medium hover:bg-gray-100 transition-colors">
                        S'inscrire
                    </button>
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
    offers: Array
})
</script>
