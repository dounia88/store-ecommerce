<template>
    <div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-blue-50">
        <!-- Navbar -->
        <Navbar />

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                    📞 Contactez-nous
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Notre équipe est là pour vous accompagner et répondre à toutes vos questions
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Envoyez-nous un message</h2>
                        <p class="text-gray-600">Nous vous répondrons dans les 24h</p>
                    </div>

                    <form @submit.prevent="submitForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nom complet *
                                </label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    v-model="form.name"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Votre nom complet"
                                >
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email *
                                </label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    v-model="form.email"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="votre@email.com"
                                >
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                Sujet *
                            </label>
                            <select 
                                id="subject" 
                                v-model="form.subject"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                                <option value="">Choisissez un sujet</option>
                                <option value="commande">📦 Question sur une commande</option>
                                <option value="produit">🛍️ Question sur un produit</option>
                                <option value="livraison">🚚 Problème de livraison</option>
                                <option value="retour">🔄 Retour/Échange</option>
                                <option value="technique">🔧 Support technique</option>
                                <option value="autre">❓ Autre</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                Message *
                            </label>
                            <textarea 
                                id="message" 
                                v-model="form.message"
                                required
                                rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors resize-none"
                                placeholder="Décrivez votre demande en détail..."
                            ></textarea>
                        </div>
                        
                        <button 
                            type="submit"
                            :disabled="isSubmitting"
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg font-semibold text-lg flex items-center justify-center"
                        >
                            <svg v-if="isSubmitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            {{ isSubmitting ? 'Envoi en cours...' : '📧 Envoyer le message' }}
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8">
                    <!-- Contact Details -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">Nos Coordonnées</h2>
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg">Adresse</h3>
                                    <p class="text-gray-600">
                                        123 Rue du Commerce<br>
                                        75001 Paris, France
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg">Téléphone</h3>
                                    <p class="text-gray-600">+33 1 23 45 67 89</p>
                                    <p class="text-sm text-gray-500">Lun-Ven: 9h-18h</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg">Email</h3>
                                    <p class="text-gray-600">contact@ecommerce.fr</p>
                                    <p class="text-sm text-gray-500">Réponse sous 24h</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-r from-orange-600 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">Horaires d'ouverture</h2>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700 font-medium">Lundi - Vendredi</span>
                                <span class="font-semibold text-green-600">9h00 - 18h00</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700 font-medium">Samedi</span>
                                <span class="font-semibold text-blue-600">10h00 - 16h00</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-700 font-medium">Dimanche</span>
                                <span class="font-semibold text-red-600">Fermé</span>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Link -->
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-xl p-8 text-white">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold mb-4">Questions Fréquentes</h2>
                            <p class="mb-6 text-blue-100">
                                Consultez notre FAQ pour trouver rapidement des réponses à vos questions.
                            </p>
                            <Link 
                                href="/faq" 
                                class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg"
                            >
                                Voir la FAQ
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="mt-16">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Notre Localisation</h2>
                        <p class="text-gray-600">Venez nous rendre visite dans notre boutique</p>
                    </div>
                    <div class="bg-gray-200 rounded-xl h-64 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            <p class="text-gray-600">Carte interactive à venir</p>
                        </div>
                    </div>
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
import { reactive, ref } from 'vue'

const props = defineProps({
    title: String
})

const form = reactive({
    name: '',
    email: '',
    subject: '',
    message: ''
})

const isSubmitting = ref(false)

const submitForm = async () => {
    isSubmitting.value = true
    
    // Simuler un délai d'envoi
    await new Promise(resolve => setTimeout(resolve, 2000))
    
    // Logique pour envoyer le formulaire
    console.log('Formulaire envoyé:', form)
    alert('Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.')
    
    // Reset form
    form.name = ''
    form.email = ''
    form.subject = ''
    form.message = ''
    
    isSubmitting.value = false
}
</script>
