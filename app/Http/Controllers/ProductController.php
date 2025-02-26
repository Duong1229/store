<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;

class ProductController extends Controller
{
    // Hiển thị trang home cho mọi người (không cần đăng nhập)
    public function indexPublic()
    {
        $products = Product::all();
        return view('index', compact('products')); // Sử dụng index.blade.php làm home
    }

    // Quản lý sản phẩm (chỉ cho admin, dùng AdminMiddleware thủ công)
    public function index()
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () {
            $products = Product::all();
            return view('products.index', compact('products')); // Sử dụng products/index.blade.php
        });
    }

    public function create()
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () {
            return view('products.create'); // Sử dụng products/create.blade.php
        });
    }

    public function store(Request $request)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($request) {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'image' => 'nullable|image'
            ]);

            $product = new Product($request->all());
            if ($request->hasFile('image')) {
                $product->image = $request->file('image')->store('products', 'public');
            }
            $product->save();

            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm');
        });
    }

    public function edit(Product $product)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($product) {
            return view('products.edit', compact('product')); // Sử dụng products/edit.blade.php
        });
    }

    public function update(Request $request, Product $product)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($request, $product) {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'image' => 'nullable|image'
            ]);

            $product->update($request->all());
            if ($request->hasFile('image')) {
                $product->image = $request->file('image')->store('products', 'public');
                $product->save();
            }

            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật');
        });
    }

    public function destroy(Product $product)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($product) {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã bị xóa');
        });
    }
}