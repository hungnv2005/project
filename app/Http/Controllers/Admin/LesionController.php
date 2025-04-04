<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Lesion;
use Illuminate\Support\Facades\Storage;

class LesionController extends Controller
{
    // Danh sách tất cả lesions
    public function index()
    {
        $lesions = Lesion::with('course')->get(); // Tải mối quan hệ course
        return view('admin.lesions.index', compact('lesions'));
    }

    // Hiển thị form tạo mới
    public function create()
{
    // Lấy danh sách từ bảng courses
    $courses = DB::table('courses')->get();

    // Trả về view tạo mới lesion với dữ liệu courses
    return view('admin.lesions.create', compact('courses'));
}

    // Lưu lesion mới vào DB
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_id' => 'required|exists:courses,id', // Thêm xác thực cho course_id
        ]);
    
        $lesion = new Lesion();
        $lesion->name = $request->name;
        $lesion->description = $request->description;
        $lesion->price = $request->price;
        $lesion->course_id = $request->course_id; // Gán giá trị course_id
    
        // Xử lý ảnh
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $lesion->image = $path;
        }
    
        $lesion->save();
    
        return redirect()->route('lesions.index')->with('success', 'Sản phẩm đã được thêm!');
    }


    // Cập nhật lesion
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $lesion = Lesion::findOrFail($id);
        $lesion->name = $request->name;
        $lesion->description = $request->description;
        $lesion->price = $request->price;
    
        // Xử lý ảnh
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($lesion->image) {
                Storage::disk('public')->delete($lesion->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $lesion->image = $path; // Gán đường dẫn ảnh
        }
    
        $lesion->save();
    
        return redirect()->route('lesions.index')->with('success', 'Sản phẩm đã được cập nhật!');
    }

    // Hiển thị 1 lesion cụ thể
    public function show($id)
{
    $lesion = Lesion::with('course')->findOrFail($id); // Tải mối quan hệ course
    return view('admin.lesions.show', compact('lesion'));
}

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $lesion = DB::table('lesions')->where('id', $id)->first();
        return view('admin.lesions.edit', compact('lesion'));
    }

    // Xóa lesion
    public function destroy($id)
    {
        DB::table('lesions')->where('id', $id)->delete();
        return redirect()->route('lesions.index')->with('success', 'Lesion deleted successfully');
    }
}
