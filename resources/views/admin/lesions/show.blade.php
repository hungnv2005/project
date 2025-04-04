@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4">Chi tiết sản phẩm</h2>

    <div class="card shadow p-4">
        <div class="mb-3">
            <strong>ID:</strong> {{ $lesion->id }}
        </div>
        <div class="mb-3">
            <strong>ID Danh mục:</strong> {{ $lesion->course_id }} <!-- Sử dụng course_id -->
        </div>
        <div class="mb-3">
            <strong>Tên danh mục:</strong> {{ $lesion->course ? $lesion->course->name : 'Không có' }}
        </div>
        <div class="mb-3">
            <strong>Tên:</strong> {{ $lesion->name }} <!-- Sử dụng name -->
        </div>
        <div class="mb-3">
            <strong>Mô tả:</strong>
            <p class="border p-3 bg-light">{{ $lesion->description }}</p> <!-- Sử dụng description -->
        </div>
        <div class="mb-3">
            <strong>Giá:</strong> {{ number_format($lesion->price, 2) }} VNĐ <!-- Hiển thị giá -->
        </div>
        <div class="mb-3">
            <strong>Ảnh:</strong> 
            @if($lesion->image)
                <br>
                <img src="{{ asset('storage/' . $lesion->image) }}" alt="Lesion Image" class="img-fluid rounded shadow-sm" style="max-width: 300px;">
            @else
                <p class="text-muted">Không có ảnh</p>
            @endif
        </div>

        <a href="{{ route('lesions.index') }}" class="btn btn-secondary mt-3">⬅️ Quay lại sản phẩm </a>
    </div>
</div>
@endsection
