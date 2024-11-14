@extends('client.layouts.master')
@section('title', 'trang shop')
@section('content')
    <section class="container max-w-screen-xl m-auto grid grid-cols-12 gap-8 mt-16">
        <!-- categories -->
        <div class="col-span-3">
            {{-- form tìm kiếm --}}
            <h3>Tìm kiếm sản phẩn theo tên</h3>
            <form action="{{route('products.search')}}" method="GET" class="max-w-md mx-auto p-4">
                @csrf
                <div class="mb-4">
                    <input type="text" name="query" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nhập tên sản phẩm...">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                    Tìm kiếm
                </button>
            </form>
            {{-- end form --}}
            <h2 class="font-semibold text-xl mb-4">Categories</h2>
            <ul>
                @foreach ($categories as $category)
                    <li class="font-medium text-[#737373] mb-2 hover:text-yellow-600"><a
                            href="{{ route('listProductByCategory.client', $category) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
            <span class="font-medium text-[#737373] mb-2 hover:text-yellow-600"><a
                    href="{{ route('listProduct.client') }}">View all
                    categories</a></span>
        </div>
        <!-- end categories -->
        <div class=" col-span-9 pt-[16px]">
            <!-- products -->
            <div class="grid grid-cols-3 gap-8">
                @foreach ($data as $product)
                    <div>
                        <div class="overflow-hidden ">
                            @if (!empty($product->image) && Storage::exists($product->image))
                                <img class="w-full h-48 object-cover hover:scale-125 duration-1000"
                                    src="{{ Storage::url($product->image) }}" alt="">
                            @else
                                <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                    alt="User Avatar" class="w-full h-48 object-cover hover:scale-125 duration-1000">
                            @endif
                        </div>
                        <div class="bg-[#F5F5F5] p-4">
                            <h3 class="font-semibold text-xl">{{ $product->name }}</h3>
                            <a href="{{ route('showProduct.client', $product) }}">
                                <p class="text-[#898989] text-base hover:text-green-500 mt-1 mb-2">View Detail</p>
                            </a>
                            <p class="font-semibold text-xl text-red-600 mb-3">{{ $product->price }}</p>
                            <a href="#"><button
                                    class="border border-solid border-yellow-500 text-yellow-700 font-semibold text-base w-full py-2 hover:bg-yellow-700 hover:text-white">Add
                                    to cart</button></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end p -->'
            <!-- pagination -->
            <div>
                {{ $data->links('vendor.pagination.tailwind') }}
            </div>
            <!-- end paginations -->
        </div>
    </section>
    <!-- chinh sach -->
    <section class="bg-[#FFF7ED] py-16 mt-16">
        <div class="container max-w-screen-xl m-auto grid grid-cols-4">
            <div class="flex gap-5 items-center">
                <img src="./assets/images/quality.png" alt="">
                <div>
                    <h3 class="font-poppins text-xl mb-1">High Quality</h3>
                    <p class="text-[#898989]">Crafted from top materials</p>
                </div>
            </div>
            <div class="flex gap-5 items-center">
                <img src="./assets/images/24-7.png" alt="">
                <div>
                    <h3 class="font-poppins text-xl mb-1">High Quality</h3>
                    <p class="text-[#898989]">Crafted from top materials</p>
                </div>
            </div>
            <div class="flex gap-5 items-center">
                <img src="./assets/images/xxxxx.png" alt="">
                <div>
                    <h3 class="font-poppins text-xl mb-1">High Quality</h3>
                    <p class="text-[#898989]">Crafted from top materials</p>
                </div>
            </div>
            <div class="flex gap-5 items-center">
                <img src="./assets/images/ship.png" alt="">
                <div>
                    <h3 class="font-poppins text-xl mb-1">High Quality</h3>
                    <p class="text-[#898989]">Crafted from top materials</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end chinh sach -->
@endsection
