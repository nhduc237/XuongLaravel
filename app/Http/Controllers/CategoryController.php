<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest("id")->paginate(10);   
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $data = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|max:2048',
        ]);
    
        // Đặt giá trị mặc định cho view
        $data['view'] = 0; 
    
        try {
            if ($request->hasFile('image')) {
                $data['image'] = Storage::put('images', $data['image']);
            }
    
            // Lưu sản phẩm với dữ liệu
            Category::create($data);
            return redirect()->route('categories.index')->with('success', true);
            
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
