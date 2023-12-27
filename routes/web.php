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

//Route Tanımlama 1
/* 
Route::get('test',function(){
    return view('test');
});
*/

//Route Tanımlama 2
//Örneğin ortak controller kullanılan view'lar group() ile çağrılabilir.  
/*
Route::controller(TestController::class)->group(function () {
    Route::get('/test', 'test')->name('url1');
    Route::get('/test2', 'test2')->name('url2');
});
*/

//Route Tanımlama 3
/* 
/admin/test 
/admin/test2
gibi sürekli ortak olan /admin yazmak yerine prefix kullanılabilir.
*/
Auth::routes(); //oturum için gerekli route'ları ekler.

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware('auth')->group(function(){
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








