<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Auth::routes(); //oturum için gerekli route'ları ekler.

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Kernel.php de middleware'ler tanımlanır.
Route::prefix('admin')->middleware('admin')->group(function(){
    // admin sayfaları için oturum kontrolü eklendi.
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/book/add', [App\Http\Controllers\BookController::class, 'create'])->name('book.create');
    Route::post('/book/add', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');

    Route::get('/book/edit/{id}', [App\Http\Controllers\BookController::class, 'edit'])->name('book.edit');
    Route::post('/book/edit/{id}', [App\Http\Controllers\BookController::class, 'update'])->name('book.update');

    Route::get('/book/delete{id}', [App\Http\Controllers\BookController::class, 'delete'])->name('book.delete');

    Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');


    Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'list'])->name('category.list');

    Route::get('/category/add', [App\Http\Controllers\CategoriesController::class, 'create'])->name('category.create');
    Route::post('/category/add', [App\Http\Controllers\CategoriesController::class, 'store'])->name('category.store');

    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('category.update');

    Route::get('/category/delete{id}', [App\Http\Controllers\CategoriesController::class, 'delete'])->name('category.delete');
});

Route::get('/category/{categoryName}', [App\Http\Controllers\BookController::class, 'categoryList']);

Route::get('/sepet', [App\Http\Controllers\CartsController::class, 'index'])->name('sepet.liste');
Route::post('/sepet', [App\Http\Controllers\CartsController::class, 'createCart'])->name('sepet');
Route::get('/sepet/delete{cart_id}', [App\Http\Controllers\CartsController::class, 'deleteProduct'])->name('sepet.sil');








