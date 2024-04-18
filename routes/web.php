<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;


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
Route::get('/', [Productcontroller::class, 'index'])->name('products.index');
Route::get('products/create', [Productcontroller::class, 'create'])->name('products.create');
Route::post('products/store', [Productcontroller::class, 'store'])->name('products.store');
Route::get('products/{id}/edit', [Productcontroller::class, 'edit'])->name('products.edit');
Route::put('products/{id}/update', [Productcontroller::class, 'update'])->name('products.update');
Route::delete('products/{id}/delete', [Productcontroller::class, 'delete'])->name('products.destroy');
Route::get('products/{id}/show', [Productcontroller::class, 'show'])->name('products.show');


