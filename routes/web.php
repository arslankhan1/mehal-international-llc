<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Home page
Route::get('/', [PageController::class, 'index'])->name('home');

// Static pages
Route::get('/sales-channels', [PageController::class, 'salesChannels'])->name('sales.channels');
Route::get('/brands', [PageController::class, 'brands'])->name('brands');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/1', [PageController::class, 'productDetail'])->name('productDetail');
// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Newsletter Route (if not already added)
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');


// Auth routes (optional)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');
