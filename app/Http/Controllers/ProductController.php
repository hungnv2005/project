<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('products');

        // Tìm kiếm theo tên
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Lọc theo loại quần áo
        if ($request->filled('category_id') && $request->category_id !== 'all') {
            $query->where('category_id', $request->category_id);
        }

        // Lọc theo khoảng giá
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $min = max(0, (float) $request->min_price);
            $max = max($min, (float) $request->max_price);
            $query->whereBetween('price', [$min, $max]);
        }
        $sort = $request->input('sort', 'latest');
        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->select('id', 'name', 'price', 'image', 'category_id')->paginate(9);
        $categories = DB::table('categories')->select('id', 'name')->get();

        return view('products.index', compact('products', 'categories'));
    }

    // Trang chi tiết sản phẩm
    public function detail($id)
{
    $product = DB::table('products')
        ->select('id', 'name', 'price', 'image', 'description', 'category_id')
        ->where('id', $id)
        ->first();

    if (!$product) {
        abort(404);
    }

    // Lấy sản phẩm liên quan (cùng category_id, nhưng không phải chính nó)
    $relatedProducts = DB::table('products')
        ->where('category_id', $product->category_id)
        ->where('id', '!=', $id)
        ->limit(4)
        ->get();

    return view('products.detail', compact('product', 'relatedProducts'));
}
}
