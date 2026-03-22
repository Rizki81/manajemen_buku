<!DOCTYPE html>
<html>
<head>
    <title>Home Perpustakaan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background:#e8f2ff;color:#0a2540;}
        .navbar{background:#1347a0!important;}
        .navbar-brand, .navbar .btn{color:#fff!important;}
        .navbar .btn{background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.5);}
        .navbar .btn:hover, .navbar .btn:focus{background:#103f8c!important; border-color:#0b2e6f!important; color:#fff!important;}
        .card{border:1px solid #aac9f7;transition:transform 0.2s ease;}
        .card:hover{transform:translateY(-4px);box-shadow:0 10px 30px rgba(19, 71, 160, 0.25);}
        .btn-primary{background:#1b72ff;border-color:#1658d3;}
        .btn-secondary{background:#6c86a4;border-color:#5e7388;}
        h1, h5, .card-title {color:#0b2f63;}
        p{color:#264269;}
        .carousel-caption h5, .carousel-caption p, .carousel-caption .lead {color: #ffffff !important;}
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container-fluid p-0">
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500" data-bs-pause="hover">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/256541/pexels-photo-256541.jpeg" class="d-block w-100" style="height: 520px; object-fit: cover;" alt="Books 1">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5 class="display-4 fw-bold">My Book Library</h5>
                    <p class="lead">Temukan koleksi buku terbaik untuk kamu.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/590493/pexels-photo-590493.jpeg" class="d-block w-100" style="height: 480px; object-fit: cover;" alt="Books 2">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                    <h5>Ruang Bacaan Nyaman</h5>
                    <p>Dapatkan inspirasi dari berbagai genre buku.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1053688/pexels-photo-1053688.jpeg" class="d-block w-100" style="height: 480px; object-fit: cover;" alt="Books 3">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                    <h5>Update Koleksi Setiap Hari</h5>
                    <p>Ikuti perpustakaan digital terbaru kami.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container mt-4">
    <div class="text-center mb-4">
        <h1 class="display-5">Selamat Datang di Perpustakaan</h1>
        <p class="lead text-secondary">Temukan buku favoritmu di koleksi kami. Klik cover untuk melihat detail lengkap.</p>
        <p class="small text-muted">Koleksi terbaru kami selalu dikemas rapi setiap hari.</p>
    </div>

    <div class="row">
        @foreach($books as $book)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none text-dark">
                        @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" style="height: 240px; object-fit: cover;" alt="Cover">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 240px;">
                                <span>No Cover</span>
                            </div>
                        @endif
                    </a>
                    <div class="card-body">
                        <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none text-dark">
                            <h5 class="card-title">{{ $book->judul }}</h5>
                            <p class="card-text mb-1"><strong>Penulis:</strong> {{ $book->penulis }}</p>
                            <p class="card-text mb-1"><strong>Pengarang:</strong> {{ $book->pengarang ?? '-' }}</p>
                            <p class="card-text mb-1"><strong>Penerbit:</strong> {{ $book->penerbit ?? '-' }}</p>
                        </a>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>