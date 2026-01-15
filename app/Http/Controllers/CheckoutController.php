<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);

        // dd($cart);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $cartItems = [];
        $subtotal = 0;

        foreach ($cart as $productId => $item) {

            $quantity = (int) $item['quantity'];

            $product = Product::with(['brand', 'images'])->find($productId);

            if ($product && $product->status === 'active' && $product->stock >= $quantity) {

                $itemSubtotal = $product->price * $quantity;

                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $itemSubtotal
                ];

                $subtotal += $itemSubtotal;
            }
        }


        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'No valid items in cart');
        }

        $user = Auth::user();

        return view('pages.checkout', compact('cartItems', 'subtotal', 'user'));
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string|max:100',
            'shipping_state' => 'required|string|max:100',
            'shipping_zip' => 'required|string|max:20',
            'billing_address' => 'nullable|string',
            'billing_city' => 'nullable|string|max:100',
            'billing_state' => 'nullable|string|max:100',
            'billing_zip' => 'nullable|string|max:20',
            'payment_method' => 'required|in:cod',
            'notes' => 'nullable|string',
        ]);

        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        DB::beginTransaction();

        try {
            // Calculate totals
            $subtotal = 0;
            $orderItems = [];

            foreach ($cart as $productId => $quantity) {
                $product = Product::lockForUpdate()->find($productId);

                if (!$product || $product->status !== 'active' || $product->stock < $quantity) {
                    throw new \Exception("Product '{$product->name}' is not available");
                }

                $itemTotal = $product->price * $quantity;
                $subtotal += $itemTotal;

                $orderItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'total' => $itemTotal
                ];
            }

            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'shipping_address' => $validated['shipping_address'],
                'shipping_city' => $validated['shipping_city'],
                'shipping_state' => $validated['shipping_state'],
                'shipping_zip' => $validated['shipping_zip'],
                'billing_address' => $validated['billing_address'] ?? $validated['shipping_address'],
                'billing_city' => $validated['billing_city'] ?? $validated['shipping_city'],
                'billing_state' => $validated['billing_state'] ?? $validated['shipping_state'],
                'billing_zip' => $validated['billing_zip'] ?? $validated['shipping_zip'],
                'subtotal' => $subtotal,
                'shipping_cost' => 0,
                'tax' => 0,
                'total' => $subtotal,
                'payment_method' => $validated['payment_method'],
                'payment_status' => 'pending',
                'order_status' => 'pending',
                'notes' => $validated['notes'],
            ]);

            // Create order items and update stock
            foreach ($orderItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'product_name' => $item['product']->name,
                    'product_sku' => $item['product']->sku,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['total'],
                ]);

                // Update product stock
                $item['product']->decrement('stock', $item['quantity']);

                // Update status if out of stock
                if ($item['product']->stock <= 0) {
                    $item['product']->update(['status' => 'sold_out']);
                }
            }

            DB::commit();

            // Clear cart
            Session::forget('cart');

            return redirect()->route('order.success', $order->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Order failed: ' . $e->getMessage());
        }
    }

    public function success($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        // Check if user owns this order (if logged in)
        if (Auth::check() && $order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('pages.order-success', compact('order'));
    }
}
