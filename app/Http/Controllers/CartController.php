<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Product $product)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => 1
        ]);
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng');
    }

    public function remove($productId)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập để xóa sản phẩm khỏi giỏ hàng.');
        }

        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        }

        return redirect()->route('cart.index')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }

    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }

        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('cart', compact('cartItems')); // Sử dụng cart.blade.php
    }
}