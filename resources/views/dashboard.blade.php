@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('products.index') }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white p-4 rounded text-center text-lg font-semibold">
                Quản lý sản phẩm
            </a>
            <a href="{{ route('orders.index') }}" 
               class="bg-green-500 hover:bg-green-600 text-white p-4 rounded text-center text-lg font-semibold">
                Quản lý đơn hàng
            </a>
        </div>
    </div>
@endsection