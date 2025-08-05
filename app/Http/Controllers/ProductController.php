<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->active();

        // Filtrage par catégorie
        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Recherche par nom
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filtrage par prix
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Tri
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $products = $query->paginate(12);
        $categories = Category::active()->get();

        return Inertia::render('Shop', [
            'products' => $products,
            'categories' => $categories,
            'filters' => $request->only(['category', 'search', 'min_price', 'max_price', 'sort', 'order'])
        ]);
    }

    public function show($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        // Incrémenter le compteur de vues
        $product->increment('views_count');

        // Produits similaires
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->limit(4)
            ->get();

        return Inertia::render('Product', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    public function featured()
    {
        $products = Product::with('category')
            ->featured()
            ->active()
            ->limit(8)
            ->get();

        return response()->json($products);
    }

    public function byCategory($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        
        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->active()
            ->paginate(12);

        return Inertia::render('Category', [
            'category' => $category,
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        
        $products = Product::with('category')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('sku', 'like', '%' . $query . '%')
            ->active()
            ->paginate(12);

        return Inertia::render('Search', [
            'query' => $query,
            'products' => $products
        ]);
    }
}
