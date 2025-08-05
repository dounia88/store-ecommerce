<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Orders', [
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order = Order::with('items.product')
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return Inertia::render('OrderDetail', [
            'order' => $order
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_first_name' => 'required|string|max:255',
            'shipping_last_name' => 'required|string|max:255',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string|max:255',
            'shipping_state' => 'required|string|max:255',
            'shipping_postal_code' => 'required|string|max:20',
            'shipping_country' => 'required|string|max:255',
            'billing_first_name' => 'required|string|max:255',
            'billing_last_name' => 'required|string|max:255',
            'billing_email' => 'required|email',
            'billing_phone' => 'required|string|max:20',
            'billing_address' => 'required|string',
            'billing_city' => 'required|string|max:255',
            'billing_state' => 'required|string|max:255',
            'billing_postal_code' => 'required|string|max:20',
            'billing_country' => 'required|string|max:255',
            'payment_method' => 'required|string',
            'cart_items' => 'required|array|min:1',
            'cart_items.*.product_id' => 'required|exists:products,id',
            'cart_items.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            // Calculer les totaux
            $subtotal = 0;
            $items = [];

            foreach ($request->cart_items as $item) {
                $product = Product::findOrFail($item['product_id']);
                
                if ($product->stock_quantity < $item['quantity']) {
                    throw new \Exception("Stock insuffisant pour {$product->name}");
                }

                $price = $product->final_price;
                $subtotal += $price * $item['quantity'];

                $items[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_sku' => $product->sku,
                    'price' => $price,
                    'quantity' => $item['quantity'],
                    'subtotal' => $price * $item['quantity'],
                    'options' => $item['options'] ?? null
                ];

                // Mettre à jour le stock
                $product->decrement('stock_quantity', $item['quantity']);
            }

            $tax = $subtotal * 0.20; // 20% TVA
            $shipping_cost = 5.99; // Frais de livraison fixes
            $total = $subtotal + $tax + $shipping_cost;

            // Créer la commande
            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping_cost' => $shipping_cost,
                'total' => $total,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'shipping_first_name' => $request->shipping_first_name,
                'shipping_last_name' => $request->shipping_last_name,
                'shipping_email' => $request->shipping_email,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_address,
                'shipping_city' => $request->shipping_city,
                'shipping_state' => $request->shipping_state,
                'shipping_postal_code' => $request->shipping_postal_code,
                'shipping_country' => $request->shipping_country,
                'billing_first_name' => $request->billing_first_name,
                'billing_last_name' => $request->billing_last_name,
                'billing_email' => $request->billing_email,
                'billing_phone' => $request->billing_phone,
                'billing_address' => $request->billing_address,
                'billing_city' => $request->billing_city,
                'billing_state' => $request->billing_state,
                'billing_postal_code' => $request->billing_postal_code,
                'billing_country' => $request->billing_country,
                'notes' => $request->notes,
            ]);

            // Créer les éléments de commande
            foreach ($items as $item) {
                $order->items()->create($item);
            }

            DB::commit();

            return redirect()->route('orders.show', $order->id)
                ->with('success', 'Votre commande a été créée avec succès !');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function cancel($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($order->status === 'pending') {
            $order->update(['status' => 'cancelled']);

            // Restaurer le stock
            foreach ($order->items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->increment('stock_quantity', $item->quantity);
                }
            }

            return back()->with('success', 'Commande annulée avec succès');
        }

        return back()->withErrors(['error' => 'Impossible d\'annuler cette commande']);
    }
}
