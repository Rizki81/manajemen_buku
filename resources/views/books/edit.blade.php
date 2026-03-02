<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            margin:0;
        }

        .navbar{
            background:#222;
            color:white;
            padding:15px 30px;
            font-size:18px;
        }

        .container{
            width:80%;
            margin:30px auto;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        label{
            display:block;
            margin-top:15px;
            margin-bottom:5px;
            font-weight:bold;
        }

        input, select{
            width:100%;
            padding:8px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        .btn{
            padding:10px 15px;
            border:none;
            border-radius:5px;
            cursor:pointer;
            margin-top:15px;
            text-decoration:none;
            display:inline-block;
        }

        .btn-primary{
            background:#0d6efd;
            color:white;
        }

        .btn-secondary{
            background:gray;
            color:white;
        }

        .alert{
            background:#ffdddd;
            color:#a00;
            padding:10px;
            border-radius:5px;
            margin-bottom:15px;
        }
    </style>
</head>

<body>

<div class="navbar">
    CRUD Book Laravel
</div>

<div class="container">

<h3>Edit Book</h3>

@if ($errors->any())
<div class="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">

<form action="{{ route('books.update',$book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Kategori</label>
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $category->id == $book->category_id ? 'selected' : '' }}>
                {{ $category->nama_kategori }}
            </option>
        @endforeach
    </select>

    <label>Judul</label>
    <input type="text" name="judul" value="{{ $book->judul }}">

    <label>Penulis</label>
    <input type="text" name="penulis" value="{{ $book->penulis }}">

    <label>Tahun Terbit</label>
    <input type="number" name="tahun_terbit" value="{{ $book->tahun_terbit }}">

    <label>Stok</label>
    <input type="number" name="stok" value="{{ $book->stok }}">

    <br>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

</body>
</html>