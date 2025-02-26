@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Danh sách sản phẩm</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">
            Thêm sản phẩm mới
        </a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 px-4">Tên</th>
                        <th class="py-2 px-4">Giá</th>
                        <th class="py-2 px-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $product->name }}</td>
                            <td class="py-2 px-4">{{ number_format($product->price) }} VNĐ</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded mr-2">
                                    Sửa
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded" 
                                            onclick="return confirm('Bạn có chắc muốn xóa?')">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection