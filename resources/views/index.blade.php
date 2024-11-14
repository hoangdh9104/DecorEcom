@extends('client.layouts.master')
@section('title', 'trang chu')
@section('content')
    <!-- nevigation banner -->
    <section><img src="./assets/images/banner.jpg" alt="" class="w-full"></section>
    <!-- newproduct -->
    <section class="container max-w-screen-xl m-auto mt-16">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold text-[40px]">New product</h2>
            <a class="border border-solid border-yellow-500 px-4 py-2 font-semibold text-base text-yellow-500 hover:bg-yellow-700 hover:text-white"
                href="{{route('listProduct.client')}}">View all products</a>
        </div>
        <!-- products -->
        <div class="grid grid-cols-4 gap-8">
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
        <!-- end all products -->
    </section>
    <!-- end newproduct -->
    <!-- gallery start -->
    <section class="container max-w-screen-xl m-auto mt-16">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold text-[40px]">Gallery</h2>
            <a class="border border-solid border-yellow-500 px-4 py-2 font-semibold text-base text-yellow-500 hover:bg-yellow-700 hover:text-white"
                href="">View all gallery</a>
        </div>
        <div class="grid grid-cols-3 gap-8">
            <img src="./assets/images/gallery 1.jpg" alt="">
            <img src="./assets/images/gallery 2.png" alt="">
            <img src="./assets/images/gallery 3.png" alt="">
            <img src="./assets/images/gallery 4.png" alt="">
            <img src="./assets/images/gallery 5.png" alt="">
            <img src="./assets/images/gallery 6.png" alt="">
        </div>
    </section>
    <!-- gallery end -->
    <!-- start news -->
    <section class="container max-w-screen-xl m-auto mt-16">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold text-[40px]">News</h2>
            <a class="border border-solid border-yellow-500 px-4 py-2 font-semibold text-base text-yellow-500 hover:bg-yellow-700 hover:text-white"
                href="">View all news</a>
        </div>
        <div class="grid grid-cols-4 gap-8">
            <div>
                <div class="overflow-hidden "><img class="hover:scale-125 duration-1000" src="./assets/images/news 1.jpg"
                        alt=""></div>
                <div class="">
                    <p class="text-[#9CA3AF] font-semibold text-sm flex items-center mt-4 mb-1"><span
                            class="material-symbols-outlined mr-1">calendar_month</span>24/4/2024</p>
                    <h3 class="font-semibold text-xl mb-3">A bedroom must have something like this</h3>
                    <a class="text-red-600 font-semibold text-base flex items-center " href="">Xem chi tiết<span
                            class="material-symbols-outlined ml-2">arrow_forward</span></a>
                </div>
            </div>
            <div>
                <div class="overflow-hidden "><img class="hover:scale-125 duration-1000" src="./assets/images/new 2.png"
                        alt=""></div>
                <div class="">
                    <p class="text-[#9CA3AF] font-semibold text-sm flex items-center mt-4 mb-1"><span
                            class="material-symbols-outlined mr-1">calendar_month</span>24/4/2024</p>
                    <h3 class="font-semibold text-xl mb-3">A bedroom must have something like this</h3>
                    <a class="text-red-600 font-semibold text-base flex items-center " href="">Xem chi tiết<span
                            class="material-symbols-outlined ml-2">arrow_forward</span></a>
                </div>
            </div>
            <div>
                <div class="overflow-hidden "><img class="hover:scale-125 duration-1000" src="./assets/images/new 3.png"
                        alt=""></div>
                <div class="">
                    <p class="text-[#9CA3AF] font-semibold text-sm flex items-center mt-4 mb-1"><span
                            class="material-symbols-outlined mr-1">calendar_month</span>24/4/2024</p>
                    <h3 class="font-semibold text-xl mb-3">A bedroom must have something like this</h3>
                    <a class="text-red-600 font-semibold text-base flex items-center " href="">Xem chi tiết<span
                            class="material-symbols-outlined ml-2">arrow_forward</span></a>
                </div>
            </div>
            <div>
                <div class="overflow-hidden "><img class="hover:scale-125 duration-1000" src="./assets/images/new 4.png"
                        alt=""></div>
                <div class="">
                    <p class="text-[#9CA3AF] font-semibold text-sm flex items-center mt-4 mb-1"><span
                            class="material-symbols-outlined mr-1">calendar_month</span>24/4/2024</p>
                    <h3 class="font-semibold text-xl mb-3">A bedroom must have something like this</h3>
                    <a class="text-red-600 font-semibold text-base flex items-center " href="">Xem chi tiết<span
                            class="material-symbols-outlined ml-2">arrow_forward</span></a>
                </div>
            </div>

        </div>
    </section>
    <!-- end news -->
    <!-- chinh sach -->
    <section class="bg-[#FFF7ED] py-16 mt-16">
        <div class="container max-w-screen-xl m-auto grid grid-cols-4">
            <div class="flex gap-5 items-center">
                <img src="./assets/images/quality.png" alt="">
                <div>
                    <h3 class="font-semibold text-xl mb-1">High Quality</h3>
                    <p class="text-[#898989]">Crafted from top materials</p>
                </div>
            </div>
            <div class="flex gap-5 items-center">
                <img src="./assets/images/24-7.png" alt="">
                <div>
                    <h3 class="font-semibold text-xl mb-1">High Quality</h3>
                    <p class="text-[#898989]">Crafted from top materials</p>
                </div>
            </div>
            <div class="flex gap-5 items-center">
                <img src="./assets/images/xxxxx.png" alt="">
                <div>
                    <h3 class="font-semibold text-xl mb-1">High Quality</h3>
                    <p class="text-[#898989]">Crafted from top materials</p>
                </div>
            </div>
            <div class="flex gap-5 items-center">
                <img src="./assets/images/ship.png" alt="">
                <div>
                    <h3 class="font-semibold text-xl mb-1">High Quality</h3>
                    <p class="text-[#898989]">Crafted from top materials</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end chinh sach -->
@endsection
