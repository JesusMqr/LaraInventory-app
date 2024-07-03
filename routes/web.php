<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('inventory')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/',[CategoryController::class,'index'])->name('categories');
    Route::prefix('category')->group(function(){
        Route::get('/show/{id}',[CategoryController::class,'show'])->name('categories.show');
        Route::get('/show/{id}/search',[CategoryController::class,'searchProducts'])->name('categories.search');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
        Route::delete('/destroy/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
        Route::put('/update/{id}',[CategoryController::class,'update'])->name('categories.update');
    });
    Route::prefix('product')->group(function(){
        Route::get('/create/{id_category}',[ProductController::class,'create'])->name('products.create');
        Route::post('/store',[ProductController::class,'store'])->name('products.store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
        Route::put('/update/{id}',[ProductController::class,'update'])->name('products.update');
        Route::delete('/destroy/{product}',[ProductController::class,'destroy'])->name('products.destroy');
    });


});







require __DIR__.'/auth.php';
