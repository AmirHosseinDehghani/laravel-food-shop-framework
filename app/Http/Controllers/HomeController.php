<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerachProductRequest;
use App\Models\Basket;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Reply;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home()
    {

        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();
        }
        $bestOff = Product::orderByDesc('off')->take(4)->get();
        $bestSalle = Product::orderByDesc('salle')->take(6)->get();
        $bestShops = Shop::orderByDesc('salle')->take(3)->get();
        $categories = Category::all();
        $products = Product::all();
        $users = User::all();
        return view('home.index', ['users' => $users, 'baskets' => $baskets, 'shops' => $bestShops, 'categories' => $categories, 'products' => $products, 'bestSalles' => $bestSalle, 'bestOffs' => $bestOff]);
    }

    public function category(int $id)
    {
        $selectedCategory = Category::query()->find($id);
        $category = Category::all();
        $products = Product::query()->where('category', $id)->get();
        $shops = Shop::all();
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();
        }
        return view('home.category', ['selectedCategory' => $selectedCategory, 'baskets' => $baskets, 'shops' => $shops, 'categories' => $category, 'products' => $products,]);
    }

    public function mostSalle()
    {
        $bestSalle = Product::orderByDesc('salle')->take(30)->get();
        $category = Category::all();
        $shops = Shop::all();
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();
        }
        return view('home.most-salle', ['baskets' => $baskets, 'shops' => $shops, 'categories' => $category, 'products' => $bestSalle]);
    }

    public function mostOff()
    {
        $bestOff = Product::orderByDesc('off')->take(30)->get();
        $shops = Shop::all();
        $category = Category::all();
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();
        }
        return view('home.most-off', ['baskets' => $baskets, 'shops' => $shops, 'categories' => $category, 'products' => $bestOff]);
    }

    public function search(SerachProductRequest $request)
    {
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();
        }
        $query = $request->input('name');
        $items = Product::all();
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(1)->appends(['name' => $query]);


        return view('home.search', ['items' => $items, 'baskets' => $baskets, 'products' => $products]);
    }

    public function product(int $id)
    {
        $price = null;
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();
        }
        $product = Product::find($id);
        if (!empty($product->off)) {
            $offAmount = ($product->price * $product->off) / 100;
            $price = $product->price - $offAmount;

        }
        $comments = Comment::query()->where('type', '0')->where('product', $id)->where('replay', null)->orderByDesc('created_at')->take(3)->get();
        $replies = Comment::whereNotNull('replay')->get();
        $relatedProducts = Product::query()->where('category', $product->category)->take(5)->get();
        $products = Product::all();
        $shop = Shop::query()->find($product->shop);
        $seller = User::query()->find($product->seller);
        return view('home.product', ['replies' => $replies, 'comments' => $comments, 'relatedProducts' => $relatedProducts, 'products' => $products, 'baskets' => $baskets, 'product' => $product, 'shop' => $shop, 'seller' => $seller, 'price' => $price]);
    }

    public function rules()
    {
        $products = Product::all();
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();

        }
        return view('home.rules', ['products' => $products, 'baskets' => $baskets]);
    }

    public function about()
    {
        $products = Product::all();
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();

        }
        return view('home.about', ['products' => $products, 'baskets' => $baskets]);
    }

    public function blog()
    {
        $blogs = Blog::orderByDesc('created_at')->take(3)->get();
        $users = User::all();
        $products = Product::all();
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();

        }
        return view('home.blog', ['blogs' => $blogs, 'users' => $users, 'products' => $products, 'baskets' => $baskets]);
    }

    public function shop(int $id)
    {
        $products = Product::all();
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();

        }
        $shop = Shop::query()->find($id);
        $shopsProduct = Product::query()->where('shop', $shop->id)->get();
        return view('home.shop', ['shopsProducts' => $shopsProduct, 'products' => $products, 'baskets' => $baskets, 'shop' => $shop]);
    }

    public function makeConversion()
    {
        $products = Product::all();
        $baskets = null;
        if (!empty(session('user'))) {
            $baskets = Basket::query()->where('buyer', session('user')->id)->get()->all();

        }
        return view('home.make-conversion', [ 'products' => $products, 'baskets' => $baskets,]);
    }
}
