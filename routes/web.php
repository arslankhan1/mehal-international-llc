<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes - Mehal International LLC
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', [PageController::class, 'index'])->name('home');

// Static pages
Route::get('/sales-channels', [PageController::class, 'salesChannels'])->name('sales.channels');
Route::get('/brands', [PageController::class, 'brands'])->name('brands');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Newsletter subscription
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Contact form submission
// Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Cart page
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Search
Route::get('/search', function () {
    return view('search');
})->name('search');
