<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>

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

    <div class="card card-custom p-4">
        <h2 class="mb-4">📂 Data Kategori</h2>

        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-custom mb-3">
            + Tambah Kategori
        </a>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Kategori</th>
                        <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>{{ $category->nama_kategori }}</td>
                        <td class="text-center">

                            <a href="{{ route('categories.edit',$category->id) }}"
                               class="btn btn-warning btn-sm btn-custom">
                                Edit
                            </a>

                            <form action="{{ route('categories.destroy',$category->id) }}"
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm btn-custom"
                                        onclick="return confirm('Yakin mau hapus kategori ini?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">
            ← Kembali ke Book
        </a>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>