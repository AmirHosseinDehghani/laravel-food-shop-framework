<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    //seller
    public function manage()
    {
        $user = session('user');
        $messages = Message::query()->where('receiver', $user->id)->get();
        $users = User::all();
        return view("main.$user->type-menu") . view('messenger.manage', ['messages' => $messages, 'users' => $users]);
    }

    public function admin()
    {
        $user = session('user');
        $messages = Message::query()->where('receiver', $user->id)->get();

        $users = User::all();
        $job = Work::query()->where('admin', $user->id)->where('register','yes')->first();
        if (!empty($job)) {

            return view("main.admin.$job->job-menu") . view('messenger.manage', ['messages' => $messages, 'users' => $users]);
        } else {
            $work = Work::query()->where('admin', $user->id)->get();
            if (!empty($work) && count($work)>0) {
                $register = 'no';
                return view("main.admin.admin-menu", ['register' => $register]) .view('messenger.manage', ['messages' => $messages, 'users' => $users]);
            } else {
                $register = 'not set';
                return view("main.admin.admin-menu", ['register' => $register]) . view('messenger.manage', ['messages' => $messages, 'users' => $users]);
            }
        }


    }

    public function edit(int $id)
    {
        $message = Message::query();
        $message->where('id', $id)->update(['type' => 'see']);
        return redirect()->route('messenger.manage')->with('success', " پیغام $id توسط شما دیده شد ");
    }
}
