<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featuredProducts = Product::with(['brand', 'images'])
            ->where('is_featured', true)
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->take(8)
            ->get();

        $brands = Brand::where('is_active', true)
            ->orderBy('sort_order')
            ->take(12)
            ->get();

        return view('welcome', compact('featuredProducts', 'brands'));
    }

    /**
     * Display the sales channels page.
     *
     * @return \Illuminate\View\View
     */
    public function salesChannels()
    {
        return view('pages.sales-channels');
    }

    /**
     * Display the brands page.
     *
     * @return \Illuminate\View\View
     */
    public function brands()
    {
        $brands = Brand::where('is_active', true)
            ->withCount('products')
            ->orderBy('sort_order')
            ->get();

        return view('pages.brands', compact('brands'));
    }

    /**
     * Display products by brand.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function brandProducts($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();

        $products = Product::with(['brand', 'images'])
            ->where('brand_id', $brand->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('pages.brand-products', compact('brand', 'products'));
    }

    /**
     * Display all products (Shop page).
     *
     * @return \Illuminate\View\View
     */
    public function products(Request $request)
    {
        $query = Product::with(['brand', 'images']);

        // Filter by availability
        if ($request->has('availability')) {
            if (in_array('in_stock', $request->availability)) {
                $query->where('status', 'active')->where('stock', '>', 0);
            }
            if (in_array('out_of_stock', $request->availability)) {
                $query->orWhere('status', 'sold_out')->orWhere('stock', '<=', 0);
            }
        }

        // Filter by price range
        if ($request->has('price_from')) {
            $query->where('price', '>=', $request->price_from);
        }
        if ($request->has('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        // Filter by brand
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Sorting
        $sortBy = $request->get('sort', 'featured');
        switch ($sortBy) {
            case 'best_selling':
                // You can add sales count later
                $query->orderBy('created_at', 'desc');
                break;
            case 'alpha_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'alpha_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'date_desc':
                $query->orderBy('created_at', 'desc');
                break;
            case 'date_asc':
                $query->orderBy('created_at', 'asc');
                break;
            default: // featured
                $query->orderBy('is_featured', 'desc')->orderBy('sort_order');
        }

        $products = $query->paginate(20);
        $brands = Brand::where('is_active', true)->orderBy('name')->get();
        $maxPrice = Product::max('price');

        return view('pages.products', compact('products', 'brands', 'maxPrice'));
    }

    /**
     * Display product detail page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function productDetail($slug)
    {
        $product = Product::with(['brand', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Get related products from same brand
        $relatedProducts = Product::with(['brand', 'images'])
            ->where('brand_id', $product->brand_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->take(4)
            ->get();

        return view('pages.product-detail', compact('product', 'relatedProducts'));
    }

    public function productDetailPage($slug)
    {
        $product = Product::with(['brand', 'images'])
            ->where('id', $slug)
            ->firstOrFail();

        // Get related products from same brand
        $relatedProducts = Product::with(['brand', 'images'])
            ->where('brand_id', $product->brand_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->take(4)
            ->get();

        return view('pages.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
