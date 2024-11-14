@extends('client.layouts.master')
@section('title', 'trang sản thanh toán')
@section('content')
    <section class="container max-w-screen-xl m-auto mb-16">
        <h1 class="font-semibold text-[40px] mt-16 mb-8">Billing details</h1>
        <form class="grid grid-cols-2 gap-8">
            <!-- form -->
            <div>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="font-medium" for="firstname">Firstname</label>
                        <input type="text"
                            class="mt-2 border border-solid border-neutral-300 block w-full outline-none p-2"
                            name="firstname">
                    </div>
                    <div>
                        <label class="font-medium" for="lastname">Lastname</label>
                        <input type="text"
                            class="mt-2 border border-solid border-neutral-300 block w-full outline-none p-2"
                            name="lastname">
                    </div>
                </div>
                <div class="mt-8">
                    <label for="company" class="font-medium">Company Name (Optional)</label>
                    <input type="text" class="block w-full p-2 border border-solid border-neutral-300 outline-none mt-2"
                        name="company">
                </div>
                <div class="mt-8">
                    <label for="country">Country</label>
                    <div class="p-2 border border-solid border-neutral-300 mt-2">
                        <select name="country" id="" class="block w-full ">
                            <option value="" class="hidden">Choose your country</option>
                            <option value="vietnam">Viet Nam</option>
                            <option value="america">America</option>
                        </select>
                    </div>
                </div>
                <div class="mt-8">
                    <label for="streetaddress" class="font-medium">Street address</label>
                    <input type="text" class="block w-full p-2 border border-solid border-neutral-300 outline-none mt-2"
                        name="streetaddress">
                </div>
                <div class="mt-8">
                    <label for="town" class="font-medium">Town / City</label>
                    <input type="text" class="block w-full p-2 border border-solid border-neutral-300 outline-none mt-2"
                        name="town">
                </div>
                <div class="mt-8">
                    <label for="province">province</label>
                    <div class="p-2 border border-solid border-neutral-300 mt-2">
                        <select name="province" id="" class="block w-full ">
                            <option value="" class="hidden">Western Province</option>
                            <option value="vietnam">Viet Nam</option>
                            <option value="america">America</option>
                        </select>
                    </div>
                </div>
                <div class="mt-8">
                    <label for="zipcode" class="font-medium">ZIP code</label>
                    <input type="text" class="block w-full p-2 border border-solid border-neutral-300 outline-none mt-2"
                        name="zipcode">
                </div>
                <div class="mt-8">
                    <label for="phone" class="font-medium">Phone</label>
                    <input type="text" class="block w-full p-2 border border-solid border-neutral-300 outline-none mt-2"
                        name="phone">
                </div>
                <div class="mt-8">
                    <label for="email" class="font-medium">Email address</label>
                    <input type="text" class="block w-full p-2 border border-solid border-neutral-300 outline-none mt-2"
                        name="email">
                </div>

            </div>

            <div>
                <p class="*:font-semibold *:text-2xl flex justify-between">
                    <span>Product</span>
                    <span>Subtotal</span>
                </p>
                <p class="flex justify-between mt-4">
                    <span class="text-neutral-500">Asgaard sofa <strong class="font-medium text-black">X1</strong></span>
                    <span class="font-medium">25.000.000đ</span>
                </p>
                <p class="flex justify-between mt-4">
                    <span>Subtotal</span>
                    <span class="font-medium">25.000.000đ</span>
                </p>
                <p class="flex justify-between mt-4">
                    <span>Total</span>
                    <span class="font-semibold text-xl text-[#B88E2F]">25.000.000đ</span>
                </p>
                <hr class="mt-8 mb-8 border border-[#A3A3A3]">
                <!-- payment method -->
                <div>
                    <input type="radio" name="payment-method" id="">
                    <span class="font-medium ml-2">Direct Bank Transfer</span>
                </div>
                <p class="mt-3 text-[#A3A3A3]">
                    Make your payment directly into our bank account. Please use your Order ID as the payment
                    reference. Your order will not be shipped until the funds have cleared in our account.
                </p>
                <div class="my-4">
                    <input type="radio" name="payment-method" id="">
                    <span class="font-medium ml-2 text-[#A3A3A3]">ATM Bank Transfer</span>
                </div>
                <div>
                    <input type="radio" name="payment-method" id="">
                    <span class="font-medium ml-2 text-[#A3A3A3]">Cash On Delivery</span>
                </div>
                <p class="mt-8 mb-8 text-[#262626]">
                    Your personal data will be used to support your experience throughout this website, to manage
                    access to your account, and for other purposes described in our <span class="font-semibold">privacy
                        policy.</span>
                </p>
                <div class="text-center">
                    <a class=" border border-yellow-600 text-yellow-500 font-semibold py-2 px-24 items-center inline-block hover:bg-yellow-600 hover:text-white"
                        href="./">
                        <button type="submit">Place order</button>
                    </a>
                </div>
                <!-- end payment-method -->

            </div>
            <!-- end form -->
        </form>
    </section>
@endsection
