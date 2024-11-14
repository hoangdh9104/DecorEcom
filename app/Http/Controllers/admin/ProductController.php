<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "admin/products";
    public function index()
    {
        $products = Product::latest('id')->paginate(15);
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
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
            Product::query()->create($data);
            return redirect()->route('products.index')->with('message', 'thêm sản phẩm thành công');
        } catch (\Throwable $th) {
            //case fail thêm mới thì xóa ảnh trong app/public/storage/....
            if (!empty($data['image']) && Storage::exists($data['image'])) {
                Storage::delete($data['image']);
            }
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => [
                'required',
                'min:3',
                Rule::unique('products', 'name')->whereNull('deleted_at')->ignore($product->id) // Bỏ qua các bản ghi đã bị xóa mềm
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
            $currentAvatar = $product->avatar;
            // cập nhật lại ảnh của đối tượng ấy
            if ($request->hasFile('image') && !empty($currentAvatar) && Storage::exists($currentAvatar)) {
                Storage::delete($currentAvatar);
            }
            // dd($data);
            $product->update($data);
            return redirect()->back()->with('message', 'sửa sản phẩm thành công');
        } catch (\Throwable $th) {
            //case fail thêm mới thì xóa ảnh trong app/public/storage/....
            if (!empty($data['image']) && Storage::exists($data['image'])) {
                Storage::delete($data['image']);
            }
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // xóa mềm không cần xóa ảnh
        try {
            $product->delete();
            return redirect()->route('products.index')->with('message', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', 'Xóa không thành công');
        }
    }
    public function deactived(Request $request, Product $product)
    {
        //  dd($request->all());
        $data = $request->except('_token', '_method');
        //  dd($data);
        $product->update($data);
        return redirect()->route('products.index')->with('message', 'thao tác thành công');
    }
    public function actived(Request $request, Product $product)
    {
        //  dd($request->all());
        $data = $request->except('_token', '_method');
        //  dd($data);
        $product->update($data);
        return redirect()->route('products.index')->with('message', 'thao tác thành công');
    }

}
