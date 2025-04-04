<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <style>
        body {
            text-align: center;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            font-size: 50px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
        .filter-container {
            display: flex;
            justify-content: center; /* Centers the elements */
            align-items: center; /* Aligns elements vertically */
            gap: 15px; /* Adds space between elements */
            margin-bottom: 20px;
        }

        .filter-container label {
            font-weight: bold;
        }

        .filter-container select, 
        .filter-container button, 
        .filter-container .reset-link {
            padding: 5px 10px;
            font-size: 14px;
        }

        .reset-link {
            text-decoration: none;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>📚Book List</h1>
    <div>
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
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

        <div class="filter-container">
            <label for="genre">Genre</label>
            <select id="genre" name="genre">
                <option>All Genres</option>
                <!-- Add genre options dynamically -->
            </select>

            <label for="subject">Subject</label>
            <select id="subject" name="subject">
                <option>All Subjects</option>
                <!-- Add subject options dynamically -->
            </select>

            <label for="availability">Availability</label>
            <select id="availability" name="availability">
                <option>All</option>
                <!-- Add availability options dynamically -->
            </select>

            <button type="submit">Filter</button>
            <a href="{{ route('LMS') }}" class="reset-link">Reset</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>
                            <a href="/books/{{ $book->id }}/edit" style="text-decoration: none; background-color: #2196F3; color: white; padding: 5px 10px; border-radius: 5px;">Edit</a>
                            <form action="/books/{{ $book->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" style="background-color: #f44336; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <a href="/books/create" style="text-decoration: none; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px;">Add Book</a>
        </div>
    </div>
</body>
</html>