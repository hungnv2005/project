<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Khóa Học</title>
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

<!-- Nội dung chính -->
<div class="container mt-4">
    <h1 class="text-center text-primary">Website Khóa Học</h1>

    <!-- Khóa học mới nhất -->
    <div class="mt-4">
        <h2 class="text-success">📚 Khóa học mới nhất</h2>
        <div class="row">
            @foreach ($latestCourses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">Giá: <b>{{ number_format($course->price, 2) }}$</b></p>
                            <a href="{{ url('/course/' . $course->id) }}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Khóa học giá rẻ -->
    <div class="mt-4">
        <h2 class="text-danger">🔥 Khóa học giá rẻ</h2>
        <div class="row">
            @foreach ($cheapestCourses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">Giá: <b>{{ number_format($course->price, 2) }}$</b></p>
                            <a href="{{ url('/course/' . $course->id) }}" class="btn btn-warning">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
