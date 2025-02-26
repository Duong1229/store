@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Sửa sản phẩm</h1>
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block mb-1">Tên sản phẩm</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-1">Mô tả</label>
                <textarea id="description" name="description" class="w-full p-2 border rounded" required>{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block mb-1">Giá</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" class="w-full p-2 border rounded" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block mb-1">Số lượng tồn kho</label>
                <input type="number" id="stock" name="stock" value="{{ $product->stock }}" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-1">Hình ảnh</label>
                <input type="file" id="image" name="image" class="w-full p-2 border rounded">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="mt-2 w-32 h-32 object-cover rounded">
                @endif
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Cập nhật sản phẩm
            </button>
        </form>
    </div>
@endsection