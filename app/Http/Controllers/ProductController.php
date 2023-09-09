<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function show(Request $request)
    {
        if (empty($request->route()->parameter('name'))) {
            $name = 'show_product';
        } else {
            $name = $request->route()->parameter('name');
        }
        return view($name);
    }
    public function add_product(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        // 初始化购物车数组
        $cart = [];
        // 从 Cookie 中获取之前的购物车信息
        if ($request->hasCookie('cart')) {
            $cart = json_decode($request->cookie('cart'), true);
        }
        // 更新购物车中的商品数量
        $cart[$id] = $quantity;
        // 将更新后的购物车信息存储在 Cookie 中
        Cookie::queue('cart', json_encode($cart), 60);
        return  view('add_success');
    }
}
