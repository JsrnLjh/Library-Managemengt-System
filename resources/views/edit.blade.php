<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/books/{{ $book->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required><br><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required><br><br>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}" required><br><br>

        <button type="submit">Update Book</button>
    </form>

    <a href="/books">Back to List</a>
</body>
</html>