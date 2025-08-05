<template>
    <div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-blue-50">
        <!-- Navbar -->
        <Navbar />

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        🛒 Votre Panier
                    </h1>
                    <p class="text-xl text-gray-600">
                        {{ cart.items.length }} article{{ cart.items.length > 1 ? 's' : '' }} dans votre panier
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div v-if="cart.items.length === 0" class="text-center py-16 px-8">
                                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Votre panier est vide</h3>
                                <p class="text-gray-600 mb-8">Découvrez nos produits et commencez vos achats</p>
                                <Link 
                                    href="/shop" 
                                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg inline-flex items-center"
                                >
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    Continuer les achats
                                </Link>
                            </div>
                            
                            <div v-else class="divide-y divide-gray-200">
                                <div v-for="item in cart.items" :key="item.id" class="p-6 hover:bg-gray-50 transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <!-- Product Image -->
                                        <div class="relative">
                                            <img 
                                                :src="item.image || getProductImage(item.category)" 
                                                :alt="item.name" 
                                                class="w-20 h-20 object-cover rounded-lg shadow-md"
                                            >
                                            <div class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-6 w-6 flex items-center justify-center font-semibold">
                                                -20%
                                            </div>
                                        </div>
                                        
                                        <!-- Product Info -->
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-lg font-semibold text-gray-900 mb-1 line-clamp-2">
                                                {{ item.name }}
                                            </h4>
                                            <p class="text-sm text-gray-600 mb-2">
                                                {{ item.description || 'Produit de qualité exceptionnelle' }}
                                            </p>
                                            <div class="flex items-center space-x-4">
                                                <span class="text-2xl font-bold text-blue-600">{{ item.price }}€</span>
                                                <span class="text-gray-400 line-through">{{ Math.round(item.price * 1.25) }}€</span>
                                            </div>
                                        </div>
                                        
                                        <!-- Quantity Controls -->
                                        <div class="flex items-center space-x-3">
                                            <button 
                                                @click="updateQuantity(item.id, -1)" 
                                                class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors"
                                                :disabled="item.quantity <= 1"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                </svg>
                                            </button>
                                            <span class="text-lg font-semibold text-gray-900 min-w-[2rem] text-center">
                                                {{ item.quantity }}
                                            </span>
                                            <button 
                                                @click="updateQuantity(item.id, 1)" 
                                                class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <!-- Total Price -->
                                        <div class="text-right">
                                            <div class="text-xl font-bold text-gray-900">
                                                {{ (item.price * item.quantity).toFixed(2) }}€
                                            </div>
                                            <button 
                                                @click="removeItem(item.id)" 
                                                class="text-red-600 hover:text-red-800 text-sm font-medium mt-1 flex items-center"
                                            >
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Supprimer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Résumé de commande</h3>
                            
                            <!-- Summary Items -->
                            <div class="space-y-4 mb-6">
                                <div class="flex justify-between text-gray-600">
                                    <span>Sous-total ({{ cart.items.length }} article{{ cart.items.length > 1 ? 's' : '' }})</span>
                                    <span>{{ cart.total }}€</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Livraison</span>
                                    <span class="text-green-600 font-semibold">Gratuite</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Réduction</span>
                                    <span class="text-red-600 font-semibold">-{{ (cart.total * 0.2).toFixed(2) }}€</span>
                                </div>
                                <div class="border-t pt-4">
                                    <div class="flex justify-between text-xl font-bold text-gray-900">
                                        <span>Total</span>
                                        <span>{{ (cart.total * 0.8).toFixed(2) }}€</span>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">TVA incluse</p>
                                </div>
                            </div>

                            <!-- Promo Code -->
                            <div class="mb-6">
                                <div class="flex space-x-2">
                                    <input 
                                        type="text" 
                                        placeholder="Code promo" 
                                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    >
                                    <button class="bg-gray-800 text-white px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                                        Appliquer
                                    </button>
                                </div>
                            </div>

                            <!-- Checkout Button -->
                            <Link 
                                href="/checkout" 
                                class="w-full bg-gradient-to-r from-green-600 to-blue-600 text-white py-4 rounded-lg text-lg font-semibold hover:from-green-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                Procéder au paiement
                            </Link>

                            <!-- Security Info -->
                            <div class="mt-6 text-center">
                                <div class="flex items-center justify-center space-x-2 text-gray-500 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <span>Paiement sécurisé</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Continue Shopping -->
                <div v-if="cart.items.length > 0" class="text-center mt-12">
                    <Link 
                        href="/shop" 
                        class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold transition-colors"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Continuer les achats
                    </Link>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <Footer />
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import Navbar from '../Components/Navbar.vue'
import Footer from '../Components/Footer.vue'

const props = defineProps({
    title: String,
    cart: Object
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

const updateQuantity = (itemId, change) => {
    console.log('Mettre à jour quantité:', itemId, change)
    // Logique pour mettre à jour la quantité
}

const removeItem = (itemId) => {
    console.log('Supprimer article:', itemId)
    // Logique pour supprimer un article
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