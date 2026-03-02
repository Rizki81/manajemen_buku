<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>

<h2>Edit Kategori</h2>

<form action="{{ route('categories.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Kategori</label><br>
    <input type="text"
           name="nama_kategori"
           value="{{ $category->nama_kategori }}"><br><br>

    <button>Update</button>
</form>

<br>
<a href="{{ route('categories.index') }}">Kembali</a>

</body>
</html>