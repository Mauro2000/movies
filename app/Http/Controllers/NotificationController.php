<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function delete(Request $request) {

        $user =  auth()->guard('admin')->user();

        $notification = $user->Notifications->find($request->id);

        if($notification){
            $notification->markAsRead();
            return back();
        }
    }

    public function deleteAll(Request $request) {

        $user =  auth()->guard('admin')->user();

        $notification = $user->Notifications ;

        if($notification){
            $notification->markAsRead();
            return back();
        }





    }
}
