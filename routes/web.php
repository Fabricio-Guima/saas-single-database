<?php

use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Products\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    dump(Store::first());

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
});



require __DIR__.'/auth.php';
