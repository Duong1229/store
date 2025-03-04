<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;

class ProductController extends Controller
{
    public function indexPublic()
    {
        $products = Product::all();
        return view('index', compact('products')); 
    }
<<<<<<< HEAD
=======

>>>>>>> 8ce5afe (update)
    public function index()
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () {
            $products = Product::all();
            return view('admin.products.index', compact('products')); 
        });
    }

    public function create()
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () {
            return view('admin.products.create'); 
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
                'image_url' => 'nullable|image' 
            ]);

            $product = new Product($request->all());
            if ($request->hasFile('image_url')) {
                $product->image_url = $request->file('image_url')->store('products', 'public');
            }
            $product->save();

            return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm');
        });
    }

    public function show(Product $product)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($product) {
            return view('admin.products.show', compact('product'));
        });
    }

    public function edit(Product $product)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($product) {
            return view('admin.products.edit', compact('product')); 
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
                'image_url' => 'nullable|image' 
            ]);

            $product->update($request->all());
            if ($request->hasFile('image_url')) {
                $product->image_url = $request->file('image_url')->store('products', 'public');
                $product->save();
            }

            return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật');
        });
    }

    public function destroy(Product $product)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Sản phẩm đã bị xóa');
        });
    }
}
