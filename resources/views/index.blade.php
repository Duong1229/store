
@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Điện thoại di động</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-lg p-4 hover:shadow-xl transition-shadow">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}" 
                         class="w-full h-48 object-cover rounded-md mb-4" alt="{{ $product->name }}">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                    <p class="text-gray-600">{{ number_format($product->price) }} VNĐ</p>
                    <p class="text-sm text-gray-500">Còn {{ $product->stock }} sản phẩm</p>
                    <div class="mt-4">
                        @auth
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" 
                                        class="bg-blue-500 hover:bg-blue-600 text-black px-4 py-2 rounded w-full">
                                    Thêm vào giỏ hàng
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="mt-2 bg-gray-500 hover:bg-gray-600 text-black px-4 py-2 rounded w-full text-center block">
                                Đăng nhập để thêm vào giỏ
                            </a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection