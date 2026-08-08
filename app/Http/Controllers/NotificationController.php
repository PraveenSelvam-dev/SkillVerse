<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = collect(array_fill(0, 5, (object)['id' => 1, 'message' => 'Notification content', 'is_read' => false]));
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        return redirect()->back()->with('success', 'Notification marked as read');
    }

    public function markAllAsRead()
    {
        return redirect()->back()->with('success', 'All notifications marked as read');
    }
}
