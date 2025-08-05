<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $products = [
            // Mode
            [
                'name' => 'T-shirt Premium',
                'slug' => 't-shirt-premium',
                'description' => 'T-shirt en coton bio de haute qualité, confortable et durable',
                'price' => 29.99,
                'sale_price' => 24.99,
                'stock_quantity' => 50,
                'sku' => 'TSH-001',
                'category_id' => $categories->where('slug', 'mode')->first()->id,
                'is_featured' => true,
                'weight' => 150,
                'specifications' => ['Matériau' => '100% Coton bio', 'Taille' => 'S, M, L, XL']
            ],
            [
                'name' => 'Jeans Slim Fit',
                'slug' => 'jeans-slim-fit',
                'description' => 'Jeans moderne avec coupe slim, parfait pour un look casual',
                'price' => 89.99,
                'stock_quantity' => 30,
                'sku' => 'JEA-001',
                'category_id' => $categories->where('slug', 'mode')->first()->id,
                'weight' => 400,
                'specifications' => ['Matériau' => 'Denim stretch', 'Taille' => '28-36']
            ],
            [
                'name' => 'Sneakers Urban',
                'slug' => 'sneakers-urban',
                'description' => 'Sneakers confortables pour un style urbain moderne',
                'price' => 129.99,
                'sale_price' => 99.99,
                'stock_quantity' => 25,
                'sku' => 'SNE-001',
                'category_id' => $categories->where('slug', 'mode')->first()->id,
                'is_featured' => true,
                'weight' => 300,
                'specifications' => ['Matériau' => 'Cuir synthétique', 'Taille' => '36-45']
            ],

            // Électronique
            [
                'name' => 'Smartphone Galaxy S24',
                'slug' => 'smartphone-galaxy-s24',
                'description' => 'Smartphone dernier cri avec appareil photo professionnel',
                'price' => 899.99,
                'stock_quantity' => 15,
                'sku' => 'SMA-001',
                'category_id' => $categories->where('slug', 'electronique')->first()->id,
                'is_featured' => true,
                'weight' => 180,
                'specifications' => ['Écran' => '6.2" AMOLED', 'Stockage' => '128GB', 'RAM' => '8GB']
            ],
            [
                'name' => 'Laptop Pro',
                'slug' => 'laptop-pro',
                'description' => 'Ordinateur portable performant pour professionnels',
                'price' => 1299.99,
                'sale_price' => 1099.99,
                'stock_quantity' => 10,
                'sku' => 'LAP-001',
                'category_id' => $categories->where('slug', 'electronique')->first()->id,
                'weight' => 1500,
                'specifications' => ['Processeur' => 'Intel i7', 'RAM' => '16GB', 'SSD' => '512GB']
            ],
            [
                'name' => 'Écouteurs Sans Fil',
                'slug' => 'ecouteurs-sans-fil',
                'description' => 'Écouteurs bluetooth avec réduction de bruit active',
                'price' => 199.99,
                'stock_quantity' => 40,
                'sku' => 'ECO-001',
                'category_id' => $categories->where('slug', 'electronique')->first()->id,
                'weight' => 50,
                'specifications' => ['Connectivité' => 'Bluetooth 5.0', 'Autonomie' => '20h']
            ],

            // Maison & Jardin
            [
                'name' => 'Lampe de Bureau LED',
                'slug' => 'lampe-bureau-led',
                'description' => 'Lampe de bureau moderne avec éclairage LED ajustable',
                'price' => 79.99,
                'stock_quantity' => 35,
                'sku' => 'LAM-001',
                'category_id' => $categories->where('slug', 'maison-jardin')->first()->id,
                'weight' => 800,
                'specifications' => ['Puissance' => '10W LED', 'Température' => '3000K-6500K']
            ],
            [
                'name' => 'Coussin Décoratif',
                'slug' => 'coussin-decoratif',
                'description' => 'Coussin décoratif en velours pour votre salon',
                'price' => 39.99,
                'sale_price' => 29.99,
                'stock_quantity' => 60,
                'sku' => 'COU-001',
                'category_id' => $categories->where('slug', 'maison-jardin')->first()->id,
                'weight' => 200,
                'specifications' => ['Matériau' => 'Velours', 'Taille' => '45x45cm']
            ],

            // Sport & Loisirs
            [
                'name' => 'Ballon de Football',
                'slug' => 'ballon-football',
                'description' => 'Ballon de football professionnel taille 5',
                'price' => 49.99,
                'stock_quantity' => 45,
                'sku' => 'BAL-001',
                'category_id' => $categories->where('slug', 'sport-loisirs')->first()->id,
                'weight' => 450,
                'specifications' => ['Taille' => '5', 'Matériau' => 'Cuir synthétique']
            ],
            [
                'name' => 'Tapis de Yoga',
                'slug' => 'tapis-yoga',
                'description' => 'Tapis de yoga antidérapant pour vos séances',
                'price' => 34.99,
                'stock_quantity' => 70,
                'sku' => 'TAP-001',
                'category_id' => $categories->where('slug', 'sport-loisirs')->first()->id,
                'weight' => 1200,
                'specifications' => ['Épaisseur' => '6mm', 'Taille' => '183x61cm']
            ],

            // Beauté & Santé
            [
                'name' => 'Crème Hydratante',
                'slug' => 'creme-hydratante',
                'description' => 'Crème hydratante bio pour tous types de peau',
                'price' => 24.99,
                'stock_quantity' => 100,
                'sku' => 'CRE-001',
                'category_id' => $categories->where('slug', 'beaute-sante')->first()->id,
                'weight' => 50,
                'specifications' => ['Volume' => '50ml', 'Type' => 'Bio']
            ],
            [
                'name' => 'Parfum Signature',
                'slug' => 'parfum-signature',
                'description' => 'Parfum signature avec notes florales et boisées',
                'price' => 89.99,
                'sale_price' => 69.99,
                'stock_quantity' => 20,
                'sku' => 'PAR-001',
                'category_id' => $categories->where('slug', 'beaute-sante')->first()->id,
                'is_featured' => true,
                'weight' => 80,
                'specifications' => ['Volume' => '50ml', 'Concentration' => 'Eau de parfum']
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
