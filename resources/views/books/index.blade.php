<!DOCTYPE html>

<html>
<head>
    <title>Data Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

```
<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
```

</head>
<body>

<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">CRUD Book Laravel</span>

```
    <div>
        <a href="{{ route('books.index') }}"
           class="btn btn-outline-light btn-sm">
           Book
        </a>

        <a href="{{ route('categories.index') }}"
           class="btn btn-outline-light btn-sm">
           Category
        </a>
    </div>
</div>
```

</nav>

<div class="container mt-4">

<!-- HEADER -->

<div class="d-flex justify-content-between mb-3">
    <h3>Data Book</h3>

```
<div>
    <a href="{{ route('categories.index') }}"
       class="btn btn-success">
       Kelola Kategori
    </a>

    <a href="{{ route('books.create') }}"
       class="btn btn-primary">
       + Tambah Book
    </a>
</div>
```

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- SEARCH & FILTER -->

<form method="GET" action="{{ route('books.index') }}" class="row mb-3">

```
<div class="col-md-4">
    <input type="text" name="search"
           class="form-control"
           placeholder="Cari Judul..."
           value="{{ request('search') }}">
</div>

<div class="col-md-4">
    <select name="category_id" class="form-select">
        <option value="">-- Filter Category --</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->nama_kategori }}
            </option>
        @endforeach

    </select>
</div>

<div class="col-md-4">
    <button class="btn btn-primary">Filter</button>
    <a href="{{ route('books.index') }}"
       class="btn btn-secondary">Reset</a>
</div>
```

</form>

<!-- TOTAL BOOK -->

<div class="alert alert-info">
    Total Book: <strong>{{ $totalBooks }}</strong>
</div>

<!-- TOTAL PER CATEGORY -->

<div class="card mb-3">
<div class="card-body">
    <h5>Total Book per Category</h5>
    <ul>
        @foreach($totalPerCategory as $category)
            <li>
                {{ $category->nama_kategori }} :
                {{ $category->books_count }}
            </li>
        @endforeach
    </ul>
</div>
</div>

<!-- TABLE -->

<div class="card">
<div class="card-body">

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>

```
<tbody>
    @foreach($books as $key => $book)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $book->category->nama_kategori ?? '-' }}</td>
        <td>{{ $book->judul }}</td>
        <td>{{ $book->penulis }}</td>
        <td>{{ $book->tahun_terbit }}</td>
        <td>
            <span class="badge bg-info">{{ $book->stok }}</span>
        </td>
        <td>
            <a href="{{ route('books.edit',$book->id) }}"
               class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('books.destroy',$book->id) }}"
                  method="POST"
                  class="d-inline">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus data?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
```

</table>

</div>
</div>

</div>
</body>
</html>
