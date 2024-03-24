<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

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
//     // $products=DB::table('products')->get();
//     return view('home.userpage');
// });

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'redirect'])->name('dashboard');
});
Route::get('/view_catagory', [AdminController::class, 'view_catagory'])->name('view_catagory');
Route::post('/add_catagory', [AdminController::class, 'add_catagory'])->name('add_catagory');
Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory'])->name('delete_catagory');

Route::get('/add_new_product', [AdminController::class, 'view_product'])->name('add_new_product_view');
Route::get('/show_product', [AdminController::class, 'show_product'])->name('show_product_view');
Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product_view');
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');

Route::POST('/add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::POST('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update_product_confirm');


Route::get('/order', [AdminController::class, 'all_orders'])->name('all_orders');
Route::get('/deliverd/{id}', [AdminController::class, 'deliverd'])->name('deliverd');
Route::get('/search',[AdminController::class,'search']);
Route::get('/search/{id}',[AdminController::class,'catbtn']);




Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');


Route::get('/remove_from_cart/{id}', [HomeController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash_order');

Route::get('/all_products', [HomeController::class, 'all_products'])->name('all_products');

Route::get('/my_orders', [HomeController::class, 'My_orders'])->name('My_orders');
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order'])->name('cancel_order');


Route::get('/home_search',[HomeController::class,'search']);
Route::get('/home_search/{id}',[HomeController::class,'catbtn']);
