<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesion->title }}</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/course/' . $lesion->course_id) }}">📘 Quay lại Khóa Học</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Chi tiết bài học -->
<div class="container mt-4">
    <h1 class="text-center text-primary">{{ $lesion->title }}</h1>

    <p class="text-muted text-center">Thuộc khóa học: 
        <a href="{{ url('/course/' . $course->id) }}">{{ $course->title }}</a>
    </p>

    <h3 class="text-success">📌 Nội dung bài học</h3>
    <p>{{ $lesion->content }}</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
