<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        form {
            width: 50%;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #2196F3;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #1e88e5;
        }
    </style>
</head>
<body>
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
        <h1>Edit Book</h1>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" placeholder="Book Title" required>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" placeholder="Author" required>
        <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" placeholder="ISBN" required>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>