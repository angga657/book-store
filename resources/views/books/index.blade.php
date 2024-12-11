<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Books</title>
</head>
<body class="container">
    <form method="GET" action="{{ route('books.index') }}">
        <label for="limit" class="col-sm-1 col-form-label mt-2">List shown : </label>
        <select name="limit" class="col-sm-2 col-form-label">
            @for ($i = 10; $i <= 100; $i += 10)
                <option value="{{ $i }}" {{ request('limit') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        <br>
        <label for="limit" class="col-sm-1 col-form-label mt-2">Search <span style="margin-left: 28px;">:</span> </label>
        <input type="text" name="search" class="col-sm-2 col-form-label" value="{{ request('search') }}">
        <br>
        <button type="submit" class="btn-primary mt-2 col-md-2">Submit</button>
    </form>
    
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>No</th>
                <th>Book Title</th>
                <th>Category</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voters</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $index => $book)
                <tr>
                    <td>{{ $books->firstItem() + $index }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ number_format($book->average_rating, 2) }}</td>
                    <td>{{ $book->voters }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>





