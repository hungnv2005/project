@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3 fw-bold"> Danh mục </h2>

        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Hãng máy</th>
                        <th>Mô tả</th>
                        <th>Giới thiệu</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->introduction }}</td>
                            <td class="text-center">
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">✏️ Sửa</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa khóa học này?')">🗑️ Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
