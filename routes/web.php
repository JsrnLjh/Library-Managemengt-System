<?php

use Illuminate\Https\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;

Route::get('/', function () {
    $books = Book::all();
    return view('LMS', compact('books'));
});

Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{id}', [BookController::class, 'update']); //Edit book
Route::get('/books/{id}', [BookController::class, 'destroy']); //Delete book