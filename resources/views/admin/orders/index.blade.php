@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Danh sách đơn hàng</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Khách hàng</th>
                        <th class="py-2 px-4">Tổng tiền</th>
                        <th class="py-2 px-4">Trạng thái</th>
                        <th class="py-2 px-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $order->id }}</td>
                            <td class="py-2 px-4">{{ $order->user->name }}</td>
                            <td class="py-2 px-4">{{ number_format($order->total) }} VNĐ</td>
                            <td class="py-2 px-4">{{ $order->status }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('orders.edit', $order) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded">
                                    Xem chi tiết
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection