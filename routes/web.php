<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;


Route::get('/', [RoutesController::class,'index'])->name('index');
Route::get('/blog', [RoutesController::class,'blog'])->name('blog');
Route::get('/post', [RoutesController::class,'post'])->name('post');
Route::any('/cart', [RoutesController::class,'cart'])->name('cart');
Route::any('/cart/update', [RoutesController::class,'updateCart'])->name('updateCart');
Route::get('/regular', [RoutesController::class,'regular'])->name('regular');
Route::get('/contact', [RoutesController::class,'contact'])->name('contact');
Route::get('/wishlist', [RoutesController::class,'wishlist'])->name('wishlist');
Route::any('/wishlist/update', [RoutesController::class,'updateWishlist'])->name('updateWishlist');
Route::any('/product/{category?}/{brand?}/{id?}', [RoutesController::class,'product'])->name('product')
    ->where('category', '[A-Za-z]+')
    ->where('brand', '[A-Za-z]+')
    ->where('id', '[0-9]+');
Route::any('/shop/{category?}/{brand?}/{min?}/{max?}', [RoutesController::class,'shop'])->name('shop')
    ->where('category', '[A-Za-z]+')
    ->where('brand', '[A-Za-z]+')
    ->where('min', '[0-9]+')
    ->where('max', '[0-9]+');


require __DIR__.'/auth.php';
