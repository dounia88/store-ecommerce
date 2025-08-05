<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Mode',
                'slug' => 'mode',
                'description' => 'Vêtements, chaussures et accessoires de mode',
                'image' => null,
                'sort_order' => 1
            ],
            [
                'name' => 'Électronique',
                'slug' => 'electronique',
                'description' => 'Smartphones, ordinateurs et gadgets électroniques',
                'image' => null,
                'sort_order' => 2
            ],
            [
                'name' => 'Maison & Jardin',
                'slug' => 'maison-jardin',
                'description' => 'Décoration, mobilier et articles pour la maison',
                'image' => null,
                'sort_order' => 3
            ],
            [
                'name' => 'Sport & Loisirs',
                'slug' => 'sport-loisirs',
                'description' => 'Équipements sportifs et articles de loisirs',
                'image' => null,
                'sort_order' => 4
            ],
            [
                'name' => 'Beauté & Santé',
                'slug' => 'beaute-sante',
                'description' => 'Cosmétiques, parfums et produits de bien-être',
                'image' => null,
                'sort_order' => 5
            ],
            [
                'name' => 'Livres & Médias',
                'slug' => 'livres-medias',
                'description' => 'Livres, films, musique et jeux vidéo',
                'image' => null,
                'sort_order' => 6
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
