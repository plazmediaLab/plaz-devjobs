<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $unreadNotify = auth()->user()->unreadNotifications;
        $notifications = auth()->user()->notifications;

        // auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index',  compact([
            'notifications',
            'unreadNotify'
        ]));
    }
}
