@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3 fw-bold">Sản phẩm</h2>

    <a href="{{ route('lesions.create') }}" class="btn btn-primary mb-3">➕ Thêm mới</a>

    <div class="card shadow p-4">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Tên danh mục</th> <!-- Thêm cột tên danh mục -->
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lesions as $lesion)
                    <tr>
                        <td>{{ $lesion->id }}</td>
                        <td>{{ $lesion->name }}</td>
                        <td>{{ Str::limit($lesion->description, 50) }}</td>
                        <td>{{ number_format($lesion->price, 2) }} VNĐ</td>
                        <td>
                            @if($lesion->image)
                            <img src="{{ asset('storage/' . $lesion->image) }}" alt="Lesion Image" class="img-thumbnail" style="max-width: 100px;">
                        @else
                            <span class="text-muted">Không có ảnh</span>
                        @endif
                        </td>
                        <td>{{ $lesion->course ? $lesion->course->name : 'Không có' }}</td> <!-- Hiển thị tên danh mục -->
                        <td class="d-flex gap-2">
                            <a href="{{ route('lesions.show', $lesion->id) }}" class="btn btn-info btn-sm">👁 Xem</a>
                            <a href="{{ route('lesions.edit', $lesion->id) }}" class="btn btn-warning btn-sm">✏️ Sửa</a>
                            <form action="{{ route('lesions.destroy', $lesion->id) }}" method="POST" onsubmit="return confirm('Xóa bài học này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
