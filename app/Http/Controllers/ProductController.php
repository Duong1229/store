<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function indexPublic()
    {
        $products = Product::all();
        return view('index', compact('products')); 
    }

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
                'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' 
            ]);

            $product = new Product($request->except('image_url')); 
            if ($request->hasFile('image_url')) {
                $image = $request->file('image_url');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/products', $imageName); 
                $product->image_url = 'products/' . $imageName; 
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
                'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' 
            ]);

            $product->update($request->except('image_url')); 

            if ($request->hasFile('image_url')) {
                // Xóa ảnh cũ 
                if ($product->image_url) {
                    Storage::delete('public/' . $product->image_url);
                }

                $image = $request->file('image_url');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/products', $imageName); 
                $product->image_url = 'products/' . $imageName; 
                $product->save();
            }
            return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật');
        });
    }

    public function destroy(Product $product)
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () use ($product) {
            if ($product->image_url) {
                Storage::delete('public/' . $product->image_url);
            }
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Sản phẩm đã bị xóa');
        });
    }
}