@extends('client.layouts.master')
@section('title', 'trang sản giỏ hàng')
@section('content')
    <section class="container max-w-screen-xl m-auto grid grid-cols-12 gap-8 my-16">
        <div class="col-span-8">
            <table class="w-full">
                <thead>
                    <tr class="bg-[#F5F5F5] *:py-4 *:font-medium">
                        <th class="text-left pl-4">Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="*:py-4 *:text-center *:font-medium">
                        <td class="!text-left"><img src="./assets/images/cartproduct img.jpg" alt=""
                                class="inline mr-4"><span class=" font-medium text-[#A3A3A3]">Asgaard sofa</span></td>
                        <td class="text-[#A3A3A3]">25.000.000đ</td>
                        <td>1</td>
                        <td class="">25.000.000đ</td>
                        <td><a href=""><span class="material-icons text-red-500">
                                    delete
                                </span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-span-4 bg-[#F5F5F5] p-8">
            <h2 class="font-semibold text-[24px] mb-4">Cart Total</h2>
            <hr class="border-[#A3A3A3] mb-5">
            <p class="flex justify-between items-center mb-4 *:font-medium">
                <span class="">Subtotal</span>
                <span class="text-[#A3A3A3]">25.000.000đ</span>
            </p>
            <p class="flex justify-between items-center mb-8 *:font-medium">
                <span>Total</span>
                <span class="text-[20px] text-red-600">25.000.000đ</span>
            </p>
            <a class="border border-solid border-yellow-600 text-yellow-600 w-full inline-block text-center py-[8px]
        hover:bg-yellow-700 hover:text-white"
                href="{{route('checkOut')}}">Checkout</a>
        </div>
    </section>
@endsection
