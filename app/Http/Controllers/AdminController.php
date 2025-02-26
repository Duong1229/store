<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;

class AdminController extends Controller
{
    public function dashboard()
    {
        $middleware = new AdminMiddleware();
        return $middleware->handle(request(), function () {
            return view('dashboard');
        });
    }
}