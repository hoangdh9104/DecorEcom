<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'products.';
    public function index()
    {
        $data = Product::latest('id')->paginate(5);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'min:3',
                Rule::unique('products', 'name')->whereNull('deleted_at') // Bỏ qua các bản ghi đã bị xóa mềm
            ],
            'image' => 'nullable|image|max:4048',
            'description' => ['required', 'string'], // 'description' là kiểu chuỗi
            'price' => ['required', 'numeric', 'min:0'], // 'price' là kiểu số và giá trị phải lớn hơn hoặc bằng 0
            'quantity' => ['required', 'integer', 'min:0'], // 'quantity' là số nguyên và phải lớn hơn hoặc bằng 0
            'category_id' => ['required', 'exists:categories,id'], // Kiểm tra tồn tại trong bảng 'categories'
            'active' => ['required', Rule::in([0, 1])], // 'active' phải là 0 hoặc 1 và bắt buộc
        ]);
        try {
            // xử lý hình ảnh
            if ($request->hasFile('image')) {
                $data['image'] = Storage::put('products', $request->file('image'));
            }
            // dd($data);
            $product = Product::query()->create($data);
            return response()->json([
                'massage' => 'Them moi thanh cong',
                'product' => $product,
            ], 201);
        } catch (\Throwable $th) {
            //case fail thêm mới thì xóa ảnh trong app/public/storage/....
            if (!empty($data['image']) && Storage::exists($data['image'])) {
                Storage::delete($data['image']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    
        $data = $request->validate([
            'name' => [
                'required',
                'min:3',
                Rule::unique('products', 'name')->whereNull('deleted_at')->ignore($product->id),
            ],
            'image' => 'nullable|image|max:4048',
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'active' => ['required', Rule::in([0, 1])],
        ]);
    
        try {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('products', 'public');
    
                // Delete the old image if it exists
                if ($product->avatar && Storage::exists($product->avatar)) {
                    Storage::delete($product->avatar);
                }
            }
    
            $product->update($data);
    
            return response()->json([
                'message' => 'Cập nhật sản phẩm thành công',
                'product' => $product,
            ], 200);
        } catch (\Throwable $th) {
            if (!empty($data['image']) && Storage::exists($data['image'])) {
                Storage::delete($data['image']);
            }
    
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'message' => 'Xoa thanh cong',

        ], 200);
    }
}
