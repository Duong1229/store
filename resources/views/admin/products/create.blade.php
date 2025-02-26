@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Thêm sản phẩm mới</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-1">Tên sản phẩm</label>
                <input type="text" id="name" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-1">Mô tả</label>
                <textarea id="description" name="description" class="w-full p-2 border rounded" required></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block mb-1">Giá</label>
                <input type="number" id="price" name="price" class="w-full p-2 border rounded" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block mb-1">Số lượng tồn kho</label>
                <input type="number" id="stock" name="stock" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-1">Hình ảnh</label>
                <input type="file" id="image" name="image" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Lưu sản phẩm
            </button>
        </form>
    </div>
@endsection