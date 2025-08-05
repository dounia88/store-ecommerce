<template>
    <div class="min-h-screen bg-pink-50">
        <!-- Navbar -->
        <Navbar />

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ title }}</h1>
                <p class="text-xl text-gray-600">Découvrez notre histoire et nos valeurs</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image -->
                <div class="order-2 lg:order-1">
                    <img 
                        src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                        alt="Notre équipe" 
                        class="rounded-lg shadow-lg w-full h-96 object-cover"
                    >
                </div>

                <!-- Content -->
                <div class="order-1 lg:order-2">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Notre Histoire</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>
                            Fondée en 2020, notre boutique en ligne s'est donnée pour mission de vous offrir 
                            les meilleurs produits au meilleur prix, avec un service client exceptionnel.
                        </p>
                        <p>
                            Nous croyons que le shopping en ligne doit être une expérience agréable, 
                            sécurisée et personnalisée. C'est pourquoi nous mettons tout en œuvre pour 
                            vous satisfaire à chaque étape de votre parcours d'achat.
                        </p>
                        <p>
                            Avec plus de 10 000 produits dans notre catalogue et une équipe dédiée 
                            de 50 personnes, nous sommes fiers de servir nos clients dans toute la France.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Values Section -->
            <div class="mt-20">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Nos Valeurs</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6 bg-white rounded-lg shadow-md">
                        <div class="text-4xl mb-4">🌟</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Qualité</h3>
                        <p class="text-gray-600">
                            Nous sélectionnons rigoureusement nos produits pour vous garantir 
                            la meilleure qualité possible.
                        </p>
                    </div>
                    <div class="text-center p-6 bg-white rounded-lg shadow-md">
                        <div class="text-4xl mb-4">🚚</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Livraison Rapide</h3>
                        <p class="text-gray-600">
                            Livraison gratuite en 24-48h partout en France pour toute commande 
                            supérieure à 50€.
                        </p>
                    </div>
                    <div class="text-center p-6 bg-white rounded-lg shadow-md">
                        <div class="text-4xl mb-4">💬</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Support Client</h3>
                        <p class="text-gray-600">
                            Notre équipe est disponible 7j/7 pour répondre à toutes vos questions 
                            et vous accompagner.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="mt-20 bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Nos Chiffres</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-3xl font-bold text-pink-600 mb-2">10K+</div>
                        <div class="text-gray-600">Produits</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-pink-600 mb-2">50K+</div>
                        <div class="text-gray-600">Clients Satisfaits</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-pink-600 mb-2">99%</div>
                        <div class="text-gray-600">Satisfaction</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-pink-600 mb-2">24h</div>
                        <div class="text-gray-600">Livraison Express</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import Navbar from '../Components/Navbar.vue'

defineProps({
    title: String
})
</script>
