@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3 fw-bold">Thêm danh mục</h2>

        <div class="card shadow p-4">
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Tên khóa học:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                

                <div class="mb-3">
                    <label for="Introduction" class="form-label fw-bold">Mô tả:</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="introduction" class="form-label fw-bold">Introduction:</label>
                    <textarea name="introduction" id="introduction" class="form-control" rows="3" required></textarea>
                </div>

                

                <button type="submit" class="btn btn-primary">💾 Lưu</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách</a>
            </form>
        </div>
    </div>
@endsection
