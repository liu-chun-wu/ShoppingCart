<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('index', function () {
    return view('index');
});
Route::get('page/{name?}', [ProductController::class, 'show'])->name('page.show');
Route::post('edit_cart', [ProductController::class, 'edit_cart'])->name('edit_cart');
