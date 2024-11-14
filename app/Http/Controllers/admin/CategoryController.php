<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "admin/categories";
    public function index()
    {
        $data = Category::withCount('products')->latest('id')->paginate(2);
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('data',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . '.' . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validate the request
        $data = $request->validate(
            [
                'name'  => ['required', 'max: 255', 'string', Rule::unique('categories')],
                'description'  => 'nullable',
            ]
        );
        // dữ liệu đúng thì tiến hành insert vào csdl
        try {
            Category::create($data);
            return redirect()->route('categories.index')->with('message', 'Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate(
            [
                'name'  => ['required', 'max: 255', 'string', Rule::unique('categories')->ignore($category->id)],
                'description'  => 'nullable',
            ]
        );
        // dữ liệu đúng thì tiến hành insert vào csdl
        try {
            $category->update($data);
            return redirect()->route('categories.index')->with('message', 'Sửa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success', false)->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // xóa mềm
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('message', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', 'Xóa không thành công');
        }
    }
}
