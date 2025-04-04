@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3 fw-bold">Chỉnh sửa sản phẩm</h1>

    <div class="card shadow p-4">
        <form action="{{ route('lesions.update', $lesion->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Tên:</label>
                <input type="text" name="name" id="name" value="{{ $lesion->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label fw-bold">ID Khóa học:</label>
                <input type="number" name="course_id" id="course_id" value="{{ $lesion->course_id }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Mô tả:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $lesion->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Giá:</label>
                <input type="number" name="price" id="price" value="{{ $lesion->price }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Ảnh:</label>
                <input type="file" name="image" id="image" class="form-control">
                <small class="text-muted">Để trống nếu không thay đổi ảnh.</small>
                @if($lesion->image)
                    <div class="mt-2">
                        <strong>Ảnh hiện tại:</strong>
                        <img src="{{ asset('storage/' . $lesion->image) }}" alt="Lesion Image" class="img-thumbnail" style="max-width: 150px;">
                    </div>
                @endif
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">✔️ Cập nhật</button>
                <a href="{{ route('lesions.index') }}" class="btn btn-secondary">⬅️ Quay lại trang sản phẩm</a>
            </div>
        </form>
    </div>
</div>
@endsection