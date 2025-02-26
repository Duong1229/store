@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Tạo đơn hàng mới</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block mb-1">Khách hàng</label>
                <select id="user_id" name="user_id" class="w-full p-2 border rounded" required>
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="total" class="block mb-1">Tổng tiền</label>
                <input type="number" id="total" name="total" class="w-full p-2 border rounded" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block mb-1">Trạng thái</label>
                <select id="status" name="status" class="w-full p-2 border rounded" required>
                    <option value="pending">Đang chờ</option>
                    <option value="completed">Hoàn thành</option>
                    <option value="cancelled">Hủy</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Lưu đơn hàng
            </button>
        </form>
    </div>
@endsection