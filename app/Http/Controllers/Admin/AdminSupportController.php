<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSupportController extends Controller
{
    public function index(Request $request)
    {
        $tickets = collect(array_fill(0, 10, (object)['id' => 1, 'subject' => 'Support Ticket', 'status' => 'open']));
        return view('admin.support.index', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = (object)['id' => $id, 'subject' => 'Support Ticket'];
        $replies = [];
        return view('admin.support.show', compact('ticket', 'replies'));
    }

    public function reply(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Reply added successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Ticket status updated');
    }
}
