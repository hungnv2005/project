<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LesionController extends Controller
{
    public function show($id)
    {
        $lesion = DB::table('lesions')
            ->where('id', $id)
            ->first();

        // Kiểm tra nếu lesion tồn tại
        if (!$lesion) {
            abort(404); // Nếu không tìm thấy, trả về lỗi 404
        }

        $course = DB::table('courses')
            ->where('id', $lesion->course_id)
            ->first();

        return view('lesion', compact('lesion', 'course'));
    }
}