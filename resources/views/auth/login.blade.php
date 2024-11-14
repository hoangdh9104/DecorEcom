@extends('client.layouts.master')
@section('title', 'login')
@section('content')
    <div class="mb-8">
        <div class="flex items-center justify-center">
            <div class="w-full max-w-sm">
                <h3 class="text-center mt-5 text-2xl font-semibold">Login</h3>
                <form method="POST" action="{{ route('post.login') }}" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input type="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                            name="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                            name="password" id="password" placeholder="Enter your password">
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
