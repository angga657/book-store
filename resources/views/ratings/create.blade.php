<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ratings</title>
</head>
<body class="container">

    <h1 class="text-center">Insert Rating</h1>

    <form method="GET" action="{{ route('rate.create') }}" class="mt-5">
        <!-- Dropdown Author -->
        <label class="form-label mt-3">Book Author:</label>
        <select name="author_id" class="form-select" onchange="this.form.submit()" style="width: 20%">
            <option value="">Select an author</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </form>

    @if(request('author_id'))
    <form method="POST" action="{{ route('rate.store') }}" class="mt-3">
        @csrf
        <input type="hidden" name="author_id" value="{{ request('author_id') }}">

        <!-- Dropdown Book -->
        <label class="form-label mt-3">Book Title:</label>
        <select name="book_id" class="form-select" style="width: 20%">
            <option value="">Select a book</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>

        <!-- Rating -->
        <label class="form-label mt-3">Rating:</label>
        <select name="rating" class="form-select" style="width: 20%">
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
    @endif

</body>
</html>
