<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Models\Work;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function form()
    {
        $user = session('user');
        $job = Work::query()->where('admin', $user->id)->first();
        return view("main.admin.$job->job-menu") . view('category.form');
    }

    public function store(CategoryStoreRequest $request)
    {
        $validated = $request->validated();
        Category::query()->create($validated);
        return redirect()->route('Ad.category.form')->with('success', ' ثبت دسته بندی با موفقیت انجام شد! ');
    }

    public function manage()
    {
        $user = session('user');
        $job = Work::query()->where('admin', $user->id)->first();
        $categories = Category::all();
        return view("main.admin.$job->job-menu") . view('category.manage',['categories'=>$categories]);
    }
}
