<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('products');

        // Tìm kiếm theo tên sản phẩm
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Lọc theo khoảng giá
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $min = max(0, (float) $request->min_price);
            $max = max($min, (float) $request->max_price);
            $query->whereBetween('price', [$min, $max]);
        }

        // Lấy danh sách sản phẩm (phân trang)
        $products = $query->select('id', 'name', 'price', 'image')->paginate(12);

        return view('home', compact('products'));
    }
}
?>