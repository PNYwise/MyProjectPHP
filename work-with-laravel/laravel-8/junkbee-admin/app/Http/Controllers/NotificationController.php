<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Notification;

class NotificationController extends Controller
{
    use Notification;
    public function index()
    {
        return view('notification.push');
    }
    public function sendNotification(Request $request)
    {
        $firebaseToken = User::select('device_token')->pluck('device_token')->all();
        $notif = Notification::many($firebaseToken, $request->title, $request->body);
        if ($notif) {
            toast('success', 'success');
            return back();
        }
        return back();
        toast('', 'error');
    }
}
