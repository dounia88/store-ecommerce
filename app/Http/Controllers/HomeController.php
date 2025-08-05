<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $featuredProducts = Product::with('category')
                ->featured()
                ->active()
                ->limit(8)
                ->get();

            $categories = Category::active()->get();

            return Inertia::render('Home', [
                'title' => 'Accueil - E-Commerce',
                'featuredProducts' => $featuredProducts,
                'categories' => $categories
            ]);
        } catch (\Exception $e) {
            // En cas d'erreur, retourner une page simple
            return response()->json([
                'error' => $e->getMessage(),
                'message' => 'Erreur lors du chargement de la page d\'accueil'
            ], 500);
        }
    }
}
