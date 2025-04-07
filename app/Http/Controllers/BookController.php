<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Models\Book; // Assuming you have a Book model
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all books from the database
        $query = Book::query();

        //Filter by genre
        if ($request->has('genre_id') && $request->genre_id != '') {
            $query->where('genre_id', $request->genre_id);
        }

        //Filter by subject
        if ($request->has('subject_id') && $request->subject_id != '') {
            $query->where('subject_id', $request->subject_id);
        }
        //Filter by availability
        if ($request->has('availability') && $request->availability != '') {
            $query->where('availability', $request->availability);
        }
        
        //existing ordering
        $query->orderBy('title', 'asc'); // Order by title

        //exucute query
        $books = $query->get();

        //Get all genres and subjects for the filter dropdowns
        $genres = Genre::all();
        $subjects = Subjects::all();

        $book=Book::all();

        //Return with all data
        return view('LMS', compact('books', 'genres', 'subjects'));
    }

    

    public function create()
    {
        // Show the form to create a new book
        return view('create');
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
            return redirect()->back()->withErrors(['error' => 'Failed to create book.']);
        }
    }
    public function show($id)
    {
        // Fetch a single book by its ID
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        // Fetch a single book by its ID for editing
        $book = Book::findOrFail($id);
        return view('edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Log the incoming request data
            Log::info('Incoming book update data:', $request->all());

            // Validate the request data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'isbn' => 'required|string|max:13|unique:books,isbn,' . $id,
            ]);

            // Update the book with explicit data
            $book = Book::findOrFail($id);
            $book->update([
                'title' => $validated['title'],
                'author' => $validated['author'],
                'isbn' => $validated['isbn']
            ]);

            Log::info('Book updated successfully:', ['book_id' => $book->id]);

            return redirect('/')->with('success', 'Book updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating book:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Failed to update book.']);
        }
    }
    public function destroy($id)
    {
        try {
            // Log the incoming request data
            Log::info('Incoming book delete request:', ['book_id' => $id]);

            // Find the book and delete it
            $book = Book::findOrFail($id);
            $book->delete();

            Log::info('Book deleted successfully:', ['book_id' => $id]);

            return redirect('/')->with('success', 'Book deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting book:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Failed to delete book.']);
        }
    }
}

