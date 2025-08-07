<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ReplyRequest;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(int $id, CommentRequest $request)
    {

        $data = $request->validated();
        $data['product'] = $id;
        $data['commenter'] = session('user')->id;
        Comment::query()->create($data);
        return redirect()->route('product-info', $id)->with('success', 'نظر شما ثبت شد.');


    }

    public function admin()
    {
        $user = session('user');
        $job = Work::query()->where('admin', $user->id)->first();
        $comments = Comment::all();
        $users = User::all();
        $products = Product::all();
        return view("main.admin.$job->job-menu") . view('comment.manage', ['users' => $users, 'products' => $products, 'comments' => $comments]);
    }

    public function alarm(int $id)
    {
        $comment = Comment::find($id);
        $user = User::query()->find($comment->commenter);
        $product = Product::query()->find($comment->product);
        Message::query()->create([
            'sender' => session('user')->id,
            'receiver' => $user->id,
            'subject' => 'اخطار برای ثبت نظر ',
            'text' => "شما به دلیل ثبت نظر بد بر روی محصول $product->name اخطار دریافت کرده اید ",
        ]);
        return redirect()->route('manage-comment')->with('success', 'اخطار شما ثبت شد.');
    }

    public function changeType(int $id)
    {
        $comment = Comment::query()->find($id);
        if ($comment->type == 1) {
            $comment->update(['type' => '0']);
        } else {
            $comment->update(['type' => '1']);
        }
        return redirect()->route('manage-comment')->with('success', 'تغییرات اعمال شد.');
    }

    public function like(int $id, int $product)
    {
        $comment = Comment::query()->find($id);
        $like = $comment->like + 1;
        Comment::query()->find($id)->update(['like' => $like]);

        return redirect()->route('product-info', $product)->with('success', 'نظر شما ثبت شد.');
    }

    public function dislike(int $id, int $product)
    {
        $comment = Comment::query()->find($id);
        $comment->update(['like' => $comment->like + 1]);
        return redirect()->route('product-info', $product)->with('success', 'نظر شما ثبت شد.');
    }

    public function addReply(int $id ,ReplyRequest $request , int $product)
    {
        $reply = $request->validated();

        Comment::query()->create([
            'comment'=>$reply['comment'],
            'commenter'=>session('user')->id,
            'replay'=>$id,
            'product'=>$product,
        ]);
        return redirect()->route('product-info', $product)->with('success', 'نظر شما ثبت شد.');
    }
}
