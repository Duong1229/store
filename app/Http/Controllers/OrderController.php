<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;

class OrderController extends Controller
{
    public function checkout()
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }

        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'Chờ xử lý'
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        Cart::where('user_id', $user->id)->delete();
        return redirect('/')->with('success', 'Đặt hàng thành công');
    }

    // Quản lý đơn hàng (chỉ cho admin, dùng AdminMiddleware thủ công)
    public function index()
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () {
            $orders = Order::with('user')->get();
            return view('admin.orders.index', compact('orders')); // Sử dụng admin.orders.index cho danh sách đơn hàng
        });
    }

    public function create()
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () {
            return view('admin.orders.create'); // Sử dụng admin.orders.create cho form tạo đơn hàng
        });
    }

    public function store(Request $request)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($request) {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'total' => 'required|numeric',
                'status' => 'required|in:pending,completed,cancelled'
            ]);

            Order::create($request->all());
            return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được tạo');
        });
    }

    public function edit(Order $order)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($order) {
            return view('admin.orders.edit', compact('order')); // Sử dụng admin.orders.edit cho form chỉnh sửa đơn hàng
        });
    }

    public function update(Request $request, Order $order)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($request, $order) {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'total' => 'required|numeric',
                'status' => 'required|in:pending,completed,cancelled'
            ]);

            $order->update($request->all());
            return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được cập nhật');
        });
    }

    public function destroy(Order $order)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($order) {
            $order->delete();
            return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã bị xóa');
        });
    }
}