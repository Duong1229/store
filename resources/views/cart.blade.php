@extends('layouts.app')

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
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
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
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                            Thanh toán
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection