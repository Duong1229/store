@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Điện thoại di động</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" 
                         class="w-full h-48 object-cover rounded">
                    <h2 class="text-xl font-semibold mt-2">{{ $product->name }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">{{ number_format($product->price) }} VNĐ</p>
                    <p class="text-sm text-gray-500">Còn {{ $product->stock }} sản phẩm</p>
                    @auth
                        <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded w-full">
                                Thêm vào giỏ hàng
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="mt-4 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded w-full text-center block">
                            Đăng nhập để thêm vào giỏ
                        </a>
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
@endsection