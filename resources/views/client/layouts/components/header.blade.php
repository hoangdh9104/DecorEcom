<section class="container max-w-screen-xl m-auto flex items-center justify-between py-4">
    <a href="{{route('homeClient')}}"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
    <ul class="flex gap-8 font-medium text-xl">
        <li class="hover:text-orange-500"><a href="{{route('homeClient')}}">Home</a></li>
        <li class="hover:text-orange-500"><a href="{{ route('listProduct.client') }}">Shop</a></li>
        <li class="hover:text-orange-500"><a href="#">About</a></li>
        <li class="hover:text-orange-500"><a href="#">Contact</a></li>
    </ul>
    <div class="flex items-center space-x-4">
        @if (!Auth::check())
            <a class="nav-link" href="{{ route('register') }}">
                <i class="fas fa-user-plus"></i> Đăng ký
            </a>
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </a>
        @endif
        @if (Auth::check())
            <div class="relative inline-block text-left">
                <div>
                    <a class="nav-link dropdown-toggle flex items-center" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="material-symbols-outlined text-2xl">person</span>
                    </a>
                </div>

                <div class="absolute right-0 z-10 mt-2 w-48 rounded-md shadow-lg bg-slate-100 ring-1 ring-black ring-opacity-5 hidden"
                    id="dropdown-menu">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-menu">
                        <a class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                        <div class="border-t border-gray-200"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <form action="">
            <span class="material-symbols-outlined">search</span>
        </form>
        <a href="{{route('cart')}}">
            <span class="material-symbols-outlined">shopping_cart</span>
        </a>
    </div>
</section>
