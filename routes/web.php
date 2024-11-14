<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashController as AdminDashController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ClientProductController::class, 'index'])->name('homeClient');
// authentication
//rotue client
Route::get('products/{product}', [ClientProductController::class, 'show'])->name('showProduct.client');
Route::get('shop', [ClientProductController::class, 'listProduct'])->name('listProduct.client');
Route::get('shop/productbyCategory/{category}', [ClientProductController::class, 'listProductByCategory'])->name('listProductByCategory.client');
Route::get('/shop/search', [ClientProductController::class, 'search'])->name('products.search');
Route::get('cart', function () {
    return view('client.cart');
})->name('cart');
Route::get('check-out', function () {
    return view('client.payment');
})->name('checkOut');
// end route client
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// đường dẫn cho các trang ở phía client

// kiểm tra xem đã đăng nhập hay chưa
// dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::prefix('dashboard')->group(function () {
        // Route::get('posts', [AdminPostController::class, 'test']);
        // không cần truyền tham số bởi vì nó đã được tự xác định khi được vào trang dashboard
        Route::get('/account/edit/', [AuthController::class, 'edit'])->name('auth.edit.account');
        Route::put('/account/edit/', [AuthController::class, 'update'])->name('auth.update.account');
        Route::get('/account/changePassWord/', [AuthController::class, 'changePassword'])->name('auth.change.password');
        Route::put('/account/changePassWord/', [AuthController::class, 'changedPassword'])->name('auth.changed.password');
    });
    // Middleware [ChekcAuth::class]: admin phải có role là admin thì mới có quyền truy cập vào
    Route::middleware([CheckAuth::class])->prefix('quan-tri')->group(function () {
        // Route::get('/', function () {
        //     return view('admin.dashboard');
        // })->name('dashboard.admin');
        Route::get('/', [AdminDashController::class, 'index'])->name('dashboard.admin');
        //************************start CRUD*************************************
        // user
        Route::group(['prefix' => 'admin/users', 'as' => 'users.'], function () {
            Route::controller(AdminUserController::class)->group(function () {
                Route::get('/', 'index')->name('index');  // Route: admin/users
                Route::get('/show/{user}', 'show')->name('show'); // Route: admin/users/show/{user}

                // Chức năng kích hoạt/tắt kích hoạt tài khoản
                Route::put('/active/{user}', 'actived')->name('active'); // Route: admin/users/active/{user}
                Route::put('/deactive/{user}', 'deactived')->name('deactive'); // Route: admin/users/deactive/{user}

                // Tạo mới, chỉnh sửa và xóa tài khoản
                Route::get('/create', 'create')->name('create');  // Route: admin/users/create
                Route::post('/', 'store')->name('store');  // Route: admin/users
                Route::get('/edit/{user}', 'edit')->name('edit');  // Route: admin/users/edit/{user}
                Route::put('/{user}', 'update')->name('update');  // Route: admin/users/{user}
                Route::delete('/{user}', 'destroy')->name('destroy');  // Route: admin/users/{user}
            });
        });
        // end user
        // category

        Route::resource('/categories', AdminCategoryController::class);
        // end category
        // product
        Route::resource('/products', AdminProductController::class);
        // Chức năng kích hoạt/tắt kích hoạt sản phẩm
        Route::put('/active/{product}', [AdminProductController::class, 'actived'])->name('products.active'); // Route: admin/products/active/{product}
        Route::put('/deactive/{product}', [AdminProductController::class, 'deactived'])->name('products.deactive'); // Route: admin/products/deactive/{product}
        // end product
        // ************************ end CRUD *************************
    });
});
