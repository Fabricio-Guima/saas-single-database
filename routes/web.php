<?php

use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Front\StoreController;
use App\Models\Store;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//subdomains routes stores
Route::domain('{subdomain}.localhost')->group(function(){
    Route::get('/', [StoreController::class, 'index'])->name('front.store');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
});



require __DIR__.'/auth.php';
