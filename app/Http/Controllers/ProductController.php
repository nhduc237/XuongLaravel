<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view("admin.products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Category::all();
        return view("admin.products.create",compact("data"));
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:1|max:900000',
            'is_active' => ['nullable', Rule::in(['0', '1'])],
            'image' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id', // Kiểm tra xem category_id có tồn tại trong bảng categories không
        ]);
    
        // Đặt giá trị mặc định cho view
        $data['view'] = 0; 
    
        try {
            if ($request->hasFile('image')) {
                $data['image'] = Storage::put('images', $data['image']);
            }
    
            // Lưu sản phẩm với dữ liệu
            Product::create($data);
            return redirect()->route('products.index')->with('success', true);
            
        } catch (\Throwable $th) {
            if (!empty($data['image']) && Storage::exists($data['image'])) {
                Storage::delete($data['image']);
            }
            return back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
