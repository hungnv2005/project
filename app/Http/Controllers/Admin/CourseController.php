<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    // Hiển thị danh sách khóa học
    public function index()
    {
        $courses = DB::table('courses')->get();
        return view('admin.courses.index', compact('courses'));
    }

    // Hiển thị form thêm khóa học mới
    public function create()
    {
        return view('admin.courses.create');
    }

    // Xử lý lưu khóa học mới
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'price' => 'required|numeric',
        // ]);

        DB::table('courses')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'introduction' => $request->introduction,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('courses.index')->with('success', 'Thêm danh mục thành công!');
    }

    // Hiển thị thông tin chi tiết của 1 khóa học
    public function show($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Danh mụcmục không tồn tại!');
        }
        return view('admin.courses.show', compact('course'));
    }

    // Hiển thị form chỉnh sửa khóa học
    public function edit($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Danh mụcmục không tồn tại!');
        }
        return view('admin.courses.edit', compact('course'));
    }

    // Xử lý cập nhật khóa học
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        DB::table('courses')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'introduction' => $request->introduction,
            'updated_at' => now(),
        ]);

        return redirect()->route('courses.index')->with('success', 'Cập nhật khóa học thành công!');
    }

    // Xóa khóa học
    public function destroy($id)
    {
        DB::table('courses')->where('id', $id)->delete();
        return redirect()->route('courses.index')->with('success', 'Xóa danh mục thành công!');
    }
    
}
