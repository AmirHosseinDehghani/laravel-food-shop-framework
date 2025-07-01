<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $products = Product::all();
        $shops = Shop::all();
        return  view('home.index',['shops'=>$shops , 'categories' => $categories , 'products'=>$products]);
    }
}
