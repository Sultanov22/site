<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories',[CategoryController::class, 'index'])->name('categories.list');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'list'])->name('users.list');
    Route::get('/edit',[ProductController::class, 'edit'])->name('users.edit');

});

Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('', [CategoryController::class, 'store'])->name('store');   
});

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('create', [ProductController::class, 'create'])->name('create');
    Route::post('', [ProductController::class, 'store'])->name('store');
});


require __DIR__.'/auth.php';
