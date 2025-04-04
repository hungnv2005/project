<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand text-primary" href="{{ url('/') }}">📚 Website Khóa Học</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">🏠 Trang Chủ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Chi tiết khóa học -->
<div class="container mt-4">
    <h1 class="text-center text-primary">{{ $course->title }}</h1>
    <p class="text-center">Giá: <b class="text-success">{{ number_format($course->price, 2) }}$</b></p>
    <p class="text-center">{{ $course->description }}</p>

    <h3 class="text-success">📌 Danh sách bài học</h3>
    <ul>
        @foreach ($lesions as $lesion)
            <li><a href="{{ url('/lesion/' . $lesion->id) }}">{{ $lesion->title }}</a></li>
        @endforeach
    </ul>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
