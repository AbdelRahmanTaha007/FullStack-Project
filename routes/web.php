<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleAuthController;



Route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');


Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/show_order', [HomeController::class, 'show_order']);
Route::post('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::post('/cancel_order/{id}', [HomeController::class, 'cancel_order']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);
Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/product_search', [HomeController::class, 'product_search']);
Route::get('/search_product', [HomeController::class, 'search_product']);
Route::get('/products', [HomeController::class, 'products']);


Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::post('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::post('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);
Route::get('/order', [AdminController::class, 'order']);
Route::get('/users', [AdminController::class, 'users']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);
Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
Route::get('/send_email_/{id}', [AdminController::class, 'send_email_']);
Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);
Route::post('/send_user_email_/{id}', [AdminController::class, 'send_user_email_']);
Route::get('/search', [AdminController::class, 'searchdata']);
Route::get('/searchusers', [AdminController::class, 'searchusers']);
Route::get('/getuserinfo', [AdminController::class, 'getuserinfo']);

Route::post('/make_moderator/{id}', [AdminController::class, 'make_moderator']);

Route::post('/delete_user/{id}', [AdminController::class, 'delete_user']);


Route::get('auth/google', [GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class,'callbackGoogle']);


