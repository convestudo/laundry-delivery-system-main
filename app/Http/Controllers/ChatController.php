<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;      
use App\Models\Message;

// app/Http/Controllers/ChatController.php
class ChatController extends Controller
{
    // public function index(User $user)
    // {
    //     return view('chat.index', ['user' => $user]);
    // }

    // public function index($receiverId)
    // {
    //     $user = User::findOrFail($receiverId);
    //     return view('chat.index', compact('user'));
    // }

    public function fetchMessages(User $user)
    {
        return Message::where(function ($q) use ($user) {
            $q->where('sender_id', auth()->id())->where('receiver_id', $user->id);
        })->orWhere(function ($q) use ($user) {
            $q->where('sender_id', $user->id)->where('receiver_id', auth()->id());
        })->get();
    }

    public function sendMessage(Request $request, User $user)
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'message' => $request->message,
        ]);

        broadcast(new \App\Events\MessageSent($message))->toOthers();

        return $message;
    }

    public function getMessages($receiverId)
    {
        $messages = Message::where(function($q) use ($receiverId) {
            $q->where('sender_id', auth()->id())
            ->where('receiver_id', $receiverId);
        })->orWhere(function($q) use ($receiverId) {
            $q->where('sender_id', $receiverId)
            ->where('receiver_id', auth()->id());
        })->get();

        return response()->json($messages);
    }

}

