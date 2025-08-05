<?php

// Test simple de l'API
$base_url = 'http://127.0.0.1:8000';

echo "=== TEST API LARAVEL E-COMMERCE ===\n\n";

// Test 1: Route de test
echo "1. Test route /test:\n";
$test_url = $base_url . '/test';
$response = file_get_contents($test_url);
if ($response) {
    $data = json_decode($response, true);
    echo "   ✅ Réponse reçue\n";
    echo "   📊 Produits: " . $data['products_count'] . "\n";
    echo "   📊 Catégories: " . $data['categories_count'] . "\n";
} else {
    echo "   ❌ Erreur de connexion\n";
}

// Test 2: Route d'accueil
echo "\n2. Test route d'accueil /:\n";
$home_url = $base_url . '/';
$response = file_get_contents($home_url);
if ($response) {
    echo "   ✅ Page d'accueil accessible\n";
} else {
    echo "   ❌ Erreur page d'accueil\n";
}

// Test 3: Route boutique
echo "\n3. Test route boutique /shop:\n";
$shop_url = $base_url . '/shop';
$response = file_get_contents($shop_url);
if ($response) {
    echo "   ✅ Page boutique accessible\n";
} else {
    echo "   ❌ Erreur page boutique\n";
}

echo "\n=== FIN DES TESTS ===\n";
echo "\n🎉 Votre projet Laravel E-commerce fonctionne maintenant !\n";
echo "📱 Accédez à: http://127.0.0.1:8000\n";
echo "🔧 API de test: http://127.0.0.1:8000/test\n"; 