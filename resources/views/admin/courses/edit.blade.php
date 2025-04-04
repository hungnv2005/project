@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3 fw-bold">Sửa danh mục</h2>

        <div class="card shadow p-4">
            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Tên khóa học:</label>
                    <input type="text" name="title" id="title" value="{{ $course->title }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Mô tả:</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ $course->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="introduction" class="form-label fw-bold">introduction:</label>
                    <textarea name="introduction" id="introduction" class="form-control" rows="3" required>{{ $course->description }}</textarea>
                </div>

            

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">✔️ Cập nhật</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">⬅️ Quay lại danh sách</a>
                </div>
            </form>
        </div>
    </div>
@endsection
