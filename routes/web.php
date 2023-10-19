<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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


Route::get('/about', function(){
    return view('about', [
        "name" => "Ramboe",
        "email" => "Ramboe@gmail.com"
        ]); 
});

Route::get('/welcome', [myController::class,'hallo']);

Route::get('/buku', [BukuController::class,'index']);
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/delete/{id}', [BukuController::class, 'destroy'] )->name('buku.destroy');
Route::put('/buku/edit/{id}', [BukuController::class, 'edit'] )->name('buku.edit');
Route::put('/buku/update/{id}', [BukuController::class, 'update'] )->name('buku.update');
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
