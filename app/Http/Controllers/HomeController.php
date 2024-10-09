<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tất cả danh mục
        $categories = Category::all();

        // Lấy tất cả sản phẩm đang hoạt động (is_active = 1)
        $products = Product::all();

        // Truyền dữ liệu đến view
        return view('client.index', compact('categories', 'products'));
    }

    public function shop() {
        $products = Product::query()->where('is_active', 1)->paginate(10); 
    return view('client.shop', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); // Lấy sản phẩm theo ID
        $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id) // Để không lấy sản phẩm hiện tại
        ->get();
        return view('client.shop-single', compact('product', 'relatedProducts')); // Trả về view với sản phẩm và sản phẩm cùng loại
    }
   
}
