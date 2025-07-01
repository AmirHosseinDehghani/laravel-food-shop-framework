<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function form()
    {
        return view('main.admin-menu') . view('category.form');
    }

    public function store(CategoryStoreRequest $request)
    {
        $validated = $request->validated();
        Category::query()->create($validated);
        return redirect()->route('Ad.category.form')->with('success', ' ثبت دسته بندی با موفقیت انجام شد! ');
    }

    public function manage()
    {
        $categories = Category::all();
        return view('main.admin-menu') . view('category.manage',['categories'=>$categories]);
    }
}
