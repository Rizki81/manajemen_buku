<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect halaman awal ke books
Route::get('/', function () {
    return redirect()->route('books.index');
});

// CRUD BOOK
Route::resource('books', BookController::class);

// ✅ CRUD CATEGORY (TAMBAHAN)
Route::resource('categories', CategoryController::class);

