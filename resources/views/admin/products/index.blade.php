@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Danh sách sản phẩm</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            + Thêm sản phẩm mới
        </a>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}" class="w-full h-40 object-cover rounded-md mb-4" alt="{{ $product->name }}">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                    <p class="text-gray-600">{{ number_format($product->price) }} VNĐ</p>
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                            Sửa
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                    onclick="return confirm('Bạn có chắc muốn xóa?')">
                                Xóa
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection