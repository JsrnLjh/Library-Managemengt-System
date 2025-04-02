<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book; // Assuming you have a Book model
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        // Fetch all books from the database
        $books = Book::all();
        return view('LMS', compact('books'));
    }

    public function store(Request $request)
    {
        try {
            // Log the incoming request data
            Log::info('Incoming book data:', $request->all());

            // Validate the request data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'isbn' => 'required|string|unique:books,isbn|max:13',
            ]);

            // Create new book with explicit data
            $book = Book::create([
                'title' => $validated['title'],
                'author' => $validated['author'],
                'isbn' => $validated['isbn']
            ]);

            Log::info('Book created successfully:', ['book_id' => $book->id]);

            return redirect('/')->with('success', 'Book added successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating book:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error adding book: ' . $e->getMessage());
        }
    }
    public function show($id)
    {
        // Fetch a single book by its ID
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
}
