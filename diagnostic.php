<?php

// Fichier de diagnostic pour identifier les problèmes
echo "=== DIAGNOSTIC LARAVEL E-COMMERCE ===\n\n";

// 1. Vérifier PHP
echo "1. Version PHP: " . PHP_VERSION . "\n";

// 2. Vérifier les extensions PHP nécessaires
$required_extensions = ['pdo', 'pdo_sqlite', 'openssl', 'mbstring', 'tokenizer', 'xml', 'ctype', 'json'];
echo "2. Extensions PHP requises:\n";
foreach ($required_extensions as $ext) {
    $status = extension_loaded($ext) ? "✅" : "❌";
    echo "   $status $ext\n";
}

// 3. Vérifier les permissions
echo "\n3. Permissions des dossiers:\n";
$directories = ['storage', 'storage/logs', 'storage/framework', 'bootstrap/cache'];
foreach ($directories as $dir) {
    $status = is_writable($dir) ? "✅" : "❌";
    echo "   $status $dir\n";
}

// 4. Vérifier la base de données
echo "\n4. Base de données:\n";
try {
    $pdo = new PDO('sqlite:database/database.sqlite');
    echo "   ✅ Connexion SQLite réussie\n";
    
    // Vérifier les tables
    $tables = ['users', 'categories', 'products', 'orders', 'order_items'];
    foreach ($tables as $table) {
        $stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='$table'");
        $exists = $stmt->fetch() ? "✅" : "❌";
        echo "   $exists Table $table\n";
    }
} catch (Exception $e) {
    echo "   ❌ Erreur base de données: " . $e->getMessage() . "\n";
}

// 5. Vérifier les fichiers de configuration
echo "\n5. Fichiers de configuration:\n";
$config_files = ['.env', 'config/app.php', 'config/database.php'];
foreach ($config_files as $file) {
    $status = file_exists($file) ? "✅" : "❌";
    echo "   $status $file\n";
}

// 6. Vérifier les dépendances
echo "\n6. Dépendances:\n";
$vendor_exists = is_dir('vendor') ? "✅" : "❌";
echo "   $vendor_exists Dossier vendor\n";

$composer_json = file_exists('composer.json') ? "✅" : "❌";
echo "   $composer_json composer.json\n";

echo "\n=== FIN DU DIAGNOSTIC ===\n"; 