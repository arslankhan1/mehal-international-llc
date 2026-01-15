<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $cartItems = [];
        $subtotal = 0;

        foreach ($cart as $id => $details) {
            $product = Product::with('images')->find($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $details['quantity'],
                    'subtotal' => $product->price * $details['quantity']
                ];
                $subtotal += $product->price * $details['quantity'];
            }
        }

        return view('pages.cart', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check if product is sold out
        if ($product->status === 'sold_out' || $product->stock < 1) {
            return redirect()->back()->with('error', 'This product is currently sold out.');
        }

        // Check stock availability
        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Only ' . $product->stock . ' items available in stock.');
        }

        $cart = Session::get('cart', []);

        // If product already in cart, update quantity
        if (isset($cart[$product->id])) {
            $newQuantity = $cart[$product->id]['quantity'] + $request->quantity;

            if ($newQuantity > $product->stock) {
                return redirect()->back()->with('error', 'Cannot add more items. Only ' . $product->stock . ' available.');
            }

            $cart[$product->id]['quantity'] = $newQuantity;
        } else {
            // Add new product to cart
            $cart[$product->id] = [
                'quantity' => $request->quantity,
                'name' => $product->name,
                'price' => $product->price
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Only ' . $product->stock . ' items available.'
            ]);
        }

        $cart = Session::get('cart');

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);

            // Calculate new subtotal
            $subtotal = 0;
            foreach ($cart as $id => $details) {
                $prod = Product::find($id);
                if ($prod) {
                    $subtotal += $prod->price * $details['quantity'];
                }
            }

            return response()->json([
                'success' => true,
                'subtotal' => number_format($subtotal, 2),
                'item_subtotal' => number_format($product->price * $request->quantity, 2)
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $cart = Session::get('cart');

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }

    public function count()
    {
        $cart = Session::get('cart', []);
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json(['count' => $count]);
    }
}
