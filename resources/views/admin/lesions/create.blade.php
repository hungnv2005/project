@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3 fw-bold">Thêm sản phẩm</h1>

        <div class="card shadow p-4">
            <form action="{{ route('lesions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Tên:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Mô tả:</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Giá:</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="course_id" class="form-label">Danh mục</label>
                    <select name="course_id" id="course_id" class="form-select" required>
                        <option value="">Chọn danh mục</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option> <!-- Đảm bảo rằng $course có thuộc tính name -->
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Ảnh:</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>



                <button type="submit" class="btn btn-primary">💾 Lưu</button>
                <a href="{{ route('lesions.index') }}" class="btn btn-secondary">⬅️ Quay lại sản phẩm </a>
            </form>
        </div>
    </div>
@endsection
