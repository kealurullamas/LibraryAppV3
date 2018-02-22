<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;
class NotificationController extends Controller
{
    //
    public function get()
    {
        $notification=Auth()->user()->unreadNotifications;
        return $notification;
    }
    public function read(Request $request)
    {
        Auth()->user()->unreadNotifications()->find($request->id)->markAsRead();
    }
    public function all()
    {
        Auth()->user()->unreadNotifications->markAsRead();
        return redirect('dashboard');
    }
}
