<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'welcome to my website')</title>
    {{-- link css  --}}
    @include('client.layouts.partials.css')
</head>
<body>
    <!-- nevigation bar -->
    @include('client.layouts.components.header')
    <!-- end nevigation bar -->
    <main>
        @if (session('message'))
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2" role="alert">
                {{ session('message') }}
            </div>
            <div class="border border-green-400 rounded-b bg-green-100 px-4 py-3" role="alert">
                <p class="text-sm">{{ session('message') }}</p>
            </div>
        @endif
        @yield('content')
    </main>
    {{-- footer --}}
    @include('client.layouts.components.footer')
    {{-- end footer --}}
</body>
{{-- script --}}
@include('client.layouts.partials.script')
{{-- end script --}}
</html>
