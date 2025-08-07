<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Work;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function form()
    {
        $user = session('user');
        $job = Work::query()->where('admin', $user->id)->first();
        return view('blog.form') . view("main.admin.$job->job-menu");
    }

    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = $file->store('blog', 'public');
            $data['img'] = $path;
        }
        $data['writer'] = session('user')->id;
        Blog::create($data);
        return redirect()->route('blog.form')->with('success', 'ثبت بلاگ با موفقیت انجام شد!');
    }

    public function manage()
    {
        $user = session('user');
        $job = Work::query()->where('admin', $user->id)->first();
        $blogs = Blog::query()->where('writer',session('user')->id)->get();
        return   view("main.admin.$job->job-menu") . view('blog.manage',['blogs'=>$blogs]);
    }

    public function delete(int $id)
    {
        Blog::query()->find($id)->delete();
        return redirect()->route('blog.manage')->with('success', 'ثبت بلاگ با موفقیت انجام شد!');
    }
}
