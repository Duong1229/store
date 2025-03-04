@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Sửa đơn hàng</h1>
        <form action="{{ route('orders.update', $order) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="user_id" class="block mb-1">Khách hàng</label>
                <select id="user_id" name="user_id" class="w-full p-2 border rounded" required>
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="total" class="block mb-1">Tổng tiền</label>
                <input type="number" id="total" name="total" value="{{ $order->total }}" class="w-full p-2 border rounded" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block mb-1">Trạng thái</label>
                <select id="status" name="status" class="w-full p-2 border rounded" required>
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Hủy</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-black px-4 py-2 rounded">
                Cập nhật đơn hàng
            </button>
        </form>
    </div>
@endsection