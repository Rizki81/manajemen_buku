<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .btn-custom {
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card card-custom p-4 col-md-6 mx-auto">
        <h3 class="mb-4">➕ Tambah Kategori</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text"
                       name="nama_kategori"
                       class="form-control"
                       placeholder="Masukkan nama kategori..."
                       value="{{ old('nama_kategori') }}">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-custom">
                    ← Kembali
                </a>

                <button type="submit" class="btn btn-primary btn-custom">
                    💾 Simpan
                </button>
            </div>

        </form>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>