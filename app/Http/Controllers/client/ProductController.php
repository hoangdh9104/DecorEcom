<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "client/";
    // list
    public function index()
    {
        $data = Product::where('active', 1)->latest('id')->limit(4)->get();
        // dd($data);
        return view('index', compact('data'));
    }
    // end list
    public function relatedProducts($categoryId, $currentProductId)
    {
        // Lấy các sản phẩm cùng danh mục và khác sản phẩm hiện tại, giới hạn 4 sản phẩm
        $relatedProducts = Product::where('active', 1)
            ->where('category_id', $categoryId)
            ->where('id', '!=', $currentProductId) // Loại trừ sản phẩm hiện tại
            ->latest('id')
            ->limit(4)
            ->get();
        // dd($relatedProducts);
        return $relatedProducts;
    }
    public function listProduct()
    {
        $data = Product::latest('id')->paginate(9);
        // nang cap sau
        $categories = Category::all();
        return view(self::PATH_VIEW . 'shop', compact('data', 'categories'));
    }
    public function listProductByCategory(Category $category)
    {
        $data = Product::where('category_id', $category->id)->orderByDesc('id')->paginate(9);
        $categories = Category::all();
        return view(self::PATH_VIEW . 'shop', compact('data', 'categories'));
    }
    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Tăng giá trị của trường view lên 1
        $product->increment('views');
        $categories = Category::all();
        // Lấy danh sách sản phẩm liên quan
        $relatedProducts = $this->relatedProducts($product->category_id, $product->id);
        return view(self::PATH_VIEW . 'productDetail', compact('product', 'relatedProducts'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        $data = Product::where('name', 'LIKE', "%{$searchTerm}%")->paginate(9);
        $categories = Category::all();
        return view(self::PATH_VIEW . 'shop', compact('data','categories'));
    }
    /**
     * Remove the specified resource from storage.
     */
}
