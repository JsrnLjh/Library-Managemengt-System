<?php

use Illuminate\Https\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;

Route::get('/', [BookController::class, 'index'])->name('LMS');

Route::get('/books', [BookController::class, 'index']); //shows book list page
Route::get('/books/create', [BookController::class, 'create']); //shows add book form
Route::post('/books', [BookController::class, 'store']); //shows add book form 
Route::get('/books/{id}/edit', [BookController::class, 'edit']); // Show edit form
Route::put('/books/{id}', [BookController::class, 'update']); // Update book
Route::delete('/books/{id}', [BookController::class, 'destroy']); // Delete book