@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Giỏ hàng của bạn</h1>
        @if($cartItems->isEmpty())
            <p class="text-gray-600">Giỏ hàng của bạn đang trống.</p>
        @else
            <table class="min-w-full bg-white rounded-lg shadow-md border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-gray-700 font-semibold">Sản phẩm</th>
                        <th class="py-3 px-4 border-b text-left text-gray-700 font-semibold">Giá</th>
                        <th class="py-3 px-4 border-b text-left text-gray-700 font-semibold">Số lượng</th>
                        <th class="py-3 px-4 border-b text-left text-gray-700 font-semibold">Tổng</th>
                        <th class="py-3 px-4 border-b text-left text-gray-700 font-semibold">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="py-3 px-4 border-b text-gray-800">{{ $item->product->name }}</td>
                            <td class="py-3 px-4 border-b text-gray-800">{{ number_format($item->product->price) }} VNĐ</td>
                            <td class="py-3 px-4 border-b text-gray-800">{{ $item->quantity }}</td>
                            <td class="py-3 px-4 border-b text-gray-800">{{ number_format($item->product->price * $item->quantity) }} VNĐ</td>
                            <td class="py-3 px-4 border-b">
                                <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-6 text-right">
                <p class="text-xl font-bold text-gray-800">Tổng cộng: {{ number_format($cartItems->sum(function ($item) { return $item->product->price * $item->quantity; })) }} VNĐ</p>
                <a href="{{ route('checkout') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-2 inline-block">
                    Thanh toán
                </a>
            </div>
        @endif
    </div>
@endsection