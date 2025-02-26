@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Thông tin tài khoản</h1>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <p><strong>Tên:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-4 inline-block">Chỉnh sửa</a>
        </div>
        <form action="{{ route('profile.destroy') }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Bạn có chắc muốn xóa tài khoản?')">Xóa tài khoản</button>
        </form>
    </div>
@endsection