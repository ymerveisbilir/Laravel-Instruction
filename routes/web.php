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
Route::prefix('admin')->group(function(){
    Route::get('/test', [TestController::class , 'test'])->name('url1');
    Route::get('/test2',[TestController::class , 'test2'])->name('url2');
});


