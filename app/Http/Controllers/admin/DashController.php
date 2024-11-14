<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class DashController extends Controller
{
    //Hàm lấy tổng số sản phẩm
    public function totalProducts()
    {
        return Product::count();
    }
    //Hàm lấy tổng số sản phẩm của mỗi danh mục

    public function totalProductsByCategory()
    {
        return Category::withCount('products')->get();
    }
    //Hàm lấy tổng số lượt xem của tất cả sản phẩm
    public function totalProductViews()
    {
        return Product::sum('views');
    }
    //Hàm kết hợp tất cả thống kê
    public function getStatistics()
    {
        // Tổng số sản phẩm
        $totalProducts = $this->totalProducts();

        // Tổng số sản phẩm theo từng danh mục
        $productsByCategory = $this->totalProductsByCategory();

        // Tổng số lượt xem
        $totalViews = $this->totalProductViews();

        return [
            'total_products' => $totalProducts,
            'products_by_category' => $productsByCategory,
            'total_views' => $totalViews
        ];
    }
    public function index()
    {
        $statistics = $this->getStatistics();
        return view('admin.dashboard', compact('statistics'));
    }
}
