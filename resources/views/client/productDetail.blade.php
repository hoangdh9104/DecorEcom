@extends('client.layouts.master')
@section('title', 'trang sản phẩm chi tiết')
@section('content')
    <div class="container max-w-screen-xl m-auto">
        <section class="mt-16">
            <!--  -->
            <div class="grid grid-cols-2 gap-8 mb-16">
                <div class="grid grid-cols-6 gap-8">
                    <!-- slide -->
                    <div class="col-span-1 *:mb-4">
                        @if (!empty($product->image) && Storage::exists($product->image))
                            <img src="{{ Storage::url($product->image) }}" alt="">
                        @else
                            <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                alt="User Avatar">
                        @endif
                        @if (!empty($product->image) && Storage::exists($product->image))
                            <img src="{{ Storage::url($product->image) }}" alt="">
                        @else
                            <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                alt="User Avatar">
                        @endif
                        @if (!empty($product->image) && Storage::exists($product->image))
                            <img src="{{ Storage::url($product->image) }}" alt="">
                        @else
                            <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                alt="User Avatar">
                        @endif
                        @if (!empty($product->image) && Storage::exists($product->image))
                            <img src="{{ Storage::url($product->image) }}" alt="">
                        @else
                            <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                alt="User Avatar">
                        @endif
                        @if (!empty($product->image) && Storage::exists($product->image))
                            <img src="{{ Storage::url($product->image) }}" alt="">
                        @else
                            <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                alt="User Avatar">
                        @endif
                    </div>
                    <div class="col-span-5">
                        @if (!empty($product->image) && Storage::exists($product->image))
                            <img src="{{ Storage::url($product->image) }}" alt="">
                        @else
                            <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                alt="User Avatar">
                        @endif

                    </div>
                    <!-- end slide -->
                </div>
                <div>
                    <p class="font-medium text-xl">{{ $product->name }}</p>
                    <p class="font-bold text-[40px] text-[#EF4444] my-2">{{ $product->price }}$</p>
                    <div class="flex items-center ">
                        <div class="*:text-[#FFC700] border-r border-solid border-neutral-400 pr-4 mr-4">
                            <span class="material-icons">star</span>
                            <span class="material-icons">star</span>
                            <span class="material-icons">star</span>
                            <span class="material-icons">star</span>
                            <span class="material-icons">star</span>
                        </div>
                        <span class="font-medium text-[14px] text-[#9F9F9F]">5 Customer Review</span>
                    </div>
                    <p class="font-medium my-4">
                        {{ $product->description }}
                    </p>
                    <div>
                        <p class="text-[#A3A3A3] mb-1">Size</p>
                        <div class="flex gap-4">
                            <div
                                class="bg-yellow-600 w-[30px] h-[30px] flex items-center justify-center text-white rounded">
                                L</div>
                            <div
                                class="bg-neutral-400 w-[30px] h-[30px] flex items-center justify-center text-white rounded">
                                XL</div>
                            <div
                                class="bg-neutral-400 w-[30px] h-[30px] flex items-center justify-center text-white rounded">
                                XS</div>
                        </div>
                    </div>
                    <div class="mt-4 mb-8">
                        <p class="text-[#A3A3A3] mb-1">Color</p>
                        <div class="flex gap-4">
                            <div class="bg-[#816DFA] w-[30px] h-[30px] rounded-full"></div>
                            <div class="bg-black w-[30px] h-[30px] rounded-full"></div>
                            <div class="bg-[#B88E2F]  w-[30px] h-[30px] rounded-full"></div>
                        </div>
                    </div>
                    <div>
                        {{-- todo form --}}
                        <form action="">
                            <div class="border border-solid border-neutral-400 w-fit rounded inline-block">
                                <button class="py-2 px-4">-</button>
                                <input type="text" value="1" class="w-[30px] text-center">
                                <button class="py-2 px-4">+</button>
                            </div>
                            <button type="submit"
                                class="border border-solid border-yellow-600 text-yellow-600 rounded py-2 px-10 ml-3 hover:bg-yellow-600 hover:text-white">
                                Add to cart
                            </button>
                            <button type="submit"
                                class="border border-solid border-neutral-800 text-neutral-800 rounded py-2 px-10 ml-3 hover:bg-neutral-600 hover:text-white">
                                + Compare
                            </button>
                        </form>
                        {{-- end todo form --}}
                    </div>
                    <hr class="text-neutral-400 mb-3 mt-8">
                    <div class="*:mb-[12px] *:text-[#A3A3A3]">
                        <p>{{ $product->slug }} : {{ $product->id }}</p>
                        <p>Category:
                            {{ optional($product->category)->name ?: 'No Category' }}
                        </p>
                        {{-- todo tag --}}
                        <p>Tags: Sofa, Chair, Home, Shop</p>
                        {{-- end todo tag --}}
                    </div>
                </div>
            </div>
            <!-- end short description -->
            <div>
                <div class="*: font-semibold *:text-xl *:mr-16 border-b pb-4 mb-8">
                    <a href="">Description</a>
                    <a href="" class="text-[#A3A3A3]">Additional Information</a>
                    <a href="" class="text-[#A3A3A3]">Reviews [5]</a>
                </div>
                <div class="*:text-[#A3A3A3] *:font-medium">
                    <p>Embodying the raw, wayward spirit of rock ‘n’ roll, the Kilburn portable active stereo speaker
                        takes the unmistakable look and sound of Marshall, unplugs the chords, and takes the show on the
                        road.
                    </p>
                    <p class="mt-2 mb-8">
                        Weighing in under 7 pounds, the Kilburn is a lightweight piece of vintage styled engineering.
                        Setting the bar as one of the loudest speakers in its class, the Kilburn is a compact,
                        stout-hearted hero with a well-balanced audio which boasts a clear midrange and extended highs
                        for a sound that is both articulate and pronounced. The analogue knobs allow you to fine tune
                        the controls to your personal preferences while the guitar-influenced leather strap enables easy
                        and stylish travel.
                    </p>
                    <div class="flex gap-8">
                        {{-- {{ asset('admin/vendor/owl-carousel/css/owl.carousel.min.css') }} --}}
                        <img src="{{ asset('assets/images/Rectangle 313.jpg') }}" alt="">
                        <img src="{{ asset('assets/images/Rectangle 314.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="my-16">
            <div class="mb-4 text-center">
                <h2 class="font-semibold text-[40px] text-[#262626]">Related Products</h2>
            </div>
            <!-- products -->
            {{-- nếu có sản phẩm liên quan thì show --}}
            <div class="grid grid-cols-4 gap-8">

                @foreach ($relatedProducts as $product)
                    <div>
                        <div class="overflow-hidden">
                            @if (!empty($product->image) && Storage::exists($product->image))
                                <img class="w-full h-48 object-cover hover:scale-125 duration-1000"
                                    src="{{ Storage::url($product->image) }}" alt="">
                            @else
                                <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                    alt="User Avatar" class="w-full h-48 object-cover hover:scale-125 duration-1000">
                            @endif
                        </div>
                        <div class="bg-[#F5F5F5] p-4">
                            <h3 class="font-semibold text-xl">{{ $product->title }}</h3>
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
    </div>
@endsection
