<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\StockRefillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/low_stock',[ProductController::class,'lowStock'])->name('dashboard.lowStock');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('inventory')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/',[CategoryController::class,'index'])->name('categories');
    Route::prefix('category')->group(function(){
        Route::get('/search',[CategoryController::class,'searchCategory'])->name('categories.search');
        Route::get('/show/{id}',[CategoryController::class,'show'])->name('categories.show');
        Route::get('/show/{id}/search',[CategoryController::class,'searchProducts'])->name('products.search');
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

Route::prefix('stock_refill')->middleware(['auth','verified'])->group(function(){
    Route::get('/',[StockRefillController::class,'index'])->name('stock_refill.index');
    Route::get('/create/{product_id}', [StockRefillController::class, 'create'])->name('stock_refill.create');
    Route::post('/store',[StockRefillController::class, 'store'])->name('stock_refill.store');
    Route::post('/{request}/aprove',[StockRefillController::class,'aprove'])->name('stock_refill.aprove');
    Route::post('/{request}/reject',[StockRefillController::class,'reject'])->name('stock_refill.reject');
    Route::post('/{request}/complete',[StockRefillController::class,'complete'])->name('stock_refill.complete');

});

Route::prefix('records')->middleware(['auth','verified'])->group(function(){
    Route::view('/', 'records.records')->name('records');
    Route::get('/refill',[RecordController::class,'refillRecords'])->name('records.refill');
    Route::get('/search_refill',[RecordController::class,'searchRefillRecords'])->name('records.searchRefill');
});

Route::prefix('users')->middleware(['auth','verified','role:admin'])->group(function(){
    Route::get('/',[UserController::class,'index'])->name('users');
    Route::get('/create',[UserController::class,'create'])->name('users.create');
    Route::post('register',[UserController::class,'store'])->name('users.register');
    Route::get('/edit/{user}',[UserController::class,'edit'])->name('users.edit');;
    Route::put('/update/{id}',[UserController::class,'update'])->name('users.update');
    Route::delete('/destroy/{user}',[UserController::class,'destroy'])->name('users.destroy');
});








require __DIR__.'/auth.php';
