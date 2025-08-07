<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConverseionRequest;
use App\Http\Requests\TicketRequest;
use App\Models\Conversation;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class ConversionController extends Controller
{
    public function start(ConverseionRequest $request)
    {
        $data = $request->validated();
        $company = Work::where('job', $data['company'])->orderBy('work', 'asc')->first();
        $sender = session('user')->id;
        $receiver = $company->admin;
        $ticket = Ticket::query()->create([
            'receiver' => $receiver,
            'sender' => $sender,
            'text' => $data['text'],
        ]);
        $ticketId[] = $ticket->id;
        Conversation::query()->create([
            'receiver' => $receiver,
            'sender' => $sender,
            'subject' => $data['subject'],
            'tickets' => $ticketId,
            'company' => $data['company'],
            'type' => 'open',
        ]);
        return back()->with('success', 'تیکت با موفقیت ثبت شد ،برای پیگری آن به بخش تیکت ها مراجعه کنید.');

    }

    public function manage()
    {
        $user = session('user');
        $number = 0;
        $conversions = Conversation::query()->where('receiver', $user->id)->orWhere('sender', $user->id)->get();
        foreach ($conversions as $conversion) {
            foreach ($conversion->tickets as $ticket) {
                $number = $number + 1;
            }
            $conversion->number = $number;
            $number = 0;
        }
        if ($user->type == 'admin') {
            $job = Work::query()->where('admin', $user->id)->where('register', 'yes')->first();
            return view("main.admin.$job->job-menu") . view("ticket.manage", ['conversions' => $conversions]);
        } else {
            return view("main.$user->type-menu") . view("ticket.manage", ['conversions' => $conversions]);
        }
    }

    public function list(int $id)
    {
        $user = session('user');

        $conversion = Conversation::query()->find($id);
        $users[] = User::query()->find($conversion->sender);
        $users[] = User::query()->find($conversion->receiver);
        $tickets = [];
        foreach ($conversion->tickets as $ticketId) {
            $ticket = Ticket::query()->find($ticketId);
            $tickets[] = $ticket;
        }
        if ($user->type == 'admin') {
            $job = Work::query()->where('admin', $user->id)->where('register', 'yes')->first();
            return view("main.admin.$job->job-menu") . view("ticket.list", ['tickets' => $tickets, 'users' => $users, 'id' => $conversion->id]);
        } else {
            return view("main.$user->type-menu") . view("ticket.list", ['tickets' => $tickets, 'users' => $users, 'id' => $conversion->id]);
        }
    }

    public function addTicket(int $id, TicketRequest $request)
    {
        $user = session('user');
        $data = $request->validated();
        $conversion = Conversation::query()->find($id);
        $receiver = null;
        if ($user->id == $conversion->sender) {
            $receiver = $conversion->receiver;
        } else {
            $receiver = $conversion->sender;
        }
        $ticket = Ticket::query()->create([
            'receiver' => $receiver,
            'sender' => $user->id,
            'text' => $data['text'],
        ]);
        $tickets = $conversion->tickets;
        $tickets[] = $ticket->id;
        $conversion->update(['tickets' => $tickets]);
        return back()->with('success', 'تیکت با موفقیت ثبت شد .');
    }

    public function add()
    {
        $user = session('user');
        return view("main.$user->type-menu") . view("ticket.add");
    }
}
