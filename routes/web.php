<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductoController;
use App\Http\Controllers\Product\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin/productos',ProductoController::class)->names('admin.productos');
Route::resource('admin/categorias',CategoryController::class)->names('admin.categorias');
// Route::get('/ruta-ajax', [ProductoController::class, 'metodoAjax'])->name('ruta-ajax');

Route::post('admin/productos/updateDestacado', [ProductoController::class, 'updateDestacado'] )->name('producto.updateDestacado');

Route::post('admin/productos/deleteProducto', [ProductoController::class, 'deleteProducto'] )->name('producto.deleteProducto');