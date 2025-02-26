<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-lg font-bold text-gray-800">Lê Dương Store</a>
            </div>

            <div class="hidden sm:flex space-x-4">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-500">Dashboard</a>
                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-blue-500">Giỏ hàng</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500">Đăng ký</a>
                @endauth
            </div>

            @auth
                <div class="hidden sm:flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Đăng xuất</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
