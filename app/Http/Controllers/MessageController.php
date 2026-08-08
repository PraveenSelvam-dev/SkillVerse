<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $conversations = collect(array_fill(0, 5, (object)['id' => 1, 'other_user' => 'User Name']));
        return view('messages.index', compact('conversations'));
    }

    public function show($id)
    {
        $conversation = (object)['id' => $id];
        $messages = [];
        return view('messages.show', compact('conversation', 'messages'));
    }

    public function send(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function create(Request $request)
    {
        return redirect()->route('messages.show', 1)->with('success', 'Conversation created');
    }
}
