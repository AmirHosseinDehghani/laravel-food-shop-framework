<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    //seller
    public function manage()
    {
        $messages = Message::all();
        $users = User::all();
        return view('main.seller-menu') . view('messenger.manage', ['messages' => $messages, 'users' => $users]);
    }

    public function edit(int $id)
    {
        $message = Message::query();
        $message->where('id', $id)->update(['type' => 'see']);
        return redirect()->route('messenger.manage')->with('success', " پیغام $id توسط شما دیده شد ");
    }
}
