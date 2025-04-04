<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
    width: 250px;
    background: #343a40;
    color: white;
    min-height: 100vh;
    transition: all 0.3s;
}

.sidebar a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    display: block;
    border-radius: 5px;
    transition: all 0.3s;
}

.sidebar a:hover {
    color: #007bff; /* Đổi màu chữ thành xanh khi hover */
    background: rgba(255, 255, 255, 0.1); /* Thêm màu nền mờ khi hover */
}

.sidebar .active {
    background: #495057; /* Màu nền cho liên kết đang hoạt động */
}

.content {
    flex-grow: 1;
    padding: 20px;
    background: #f8f9fa;
}
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar p-3">
            <h2 class="h5 fw-bold text-center">Admin Dashboard</h2>
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a href="{{ route('courses.index') }}" class="nav-link active no-background">Quản lý danh mục</a>
                </li>
                <li class="nav-item mt-2">
                    <a href="{{ route('lesions.index') }}" class="nav-link">Quản lý sản phẩm</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
