<!-- @extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-black">Giỏ hàng</h1>
        @if($cartItems->isEmpty())
            <p class="text-gray-600 text-black">Giỏ hàng của bạn đang trống.</p>
        @else
            <div class="space-y-4">
                @foreach($cartItems as $item)
                    <div class="flex items-center justify-between bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                        <div>
                            <h2 class="text-lg font-semibold text-black">{{ $item->product->name }}</h2>
                            <p class="text-gray-600 text-black">{{ number_format($item->product->price * $item->quantity) }} VNĐ</p>
                            <p class="text-gray-600 text-black">Số lượng: {{ $item->quantity }}</p>
                        </div>
                        <div>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-black px-2 py-1 rounded">
                                    Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4 text-right">
                    <p class="text-xl font-bold text-black">Tổng: {{ number_format($cartItems->sum(function ($item) { return $item->product->price * $item->quantity; })) }} VNĐ</p>
                    <form action="{{ route('checkout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-black px-4 py-2 rounded">
                            Thanh toán
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection -->

@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Giỏ hàng của bạn</h1>
        @if($cartItems->isEmpty())
            <p class="text-gray-600">Giỏ hàng của bạn đang trống.</p>
        @else
            <table class="min-w-full bg-white dark:bg-gray-800 border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Sản phẩm</th>
                        <th class="py-2 px-4 border-b">Giá</th>
                        <th class="py-2 px-4 border-b">Số lượng</th>
                        <th class="py-2 px-4 border-b">Tổng</th>
                        <th class="py-2 px-4 border-b">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->product->name }}</td>
                            <td class="py-2 px-4 border-b">{{ number_format($item->product->price) }} VNĐ</td>
                            <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border-b">{{ number_format($item->product->price * $item->quantity) }} VNĐ</td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('cart.remove', $item->product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 text-right">
                <p class="text-xl font-bold">Tổng cộng: {{ number_format($cartItems->sum(function ($item) { return $item->product->price * $item->quantity; })) }} VNĐ</p>
                <a href="{{ route('checkout') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-2 inline-block">Thanh toán</a>
            </div>
        @endif
    </div>
@endsection