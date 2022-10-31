<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendEmailNotification;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendEmailController extends Controller
{
    public function kirimnotifikasi()
    {
        $user = User::all();

        $details = [
            'greeting' => 'Hi, developer',
            'body' => 'ini email body',
            'actiontext' => 'email actions text',
            'actionurl' => '/',
            'lastline' => 'lastline'
        ];

        FacadesNotification::send($user, new SendEmailNotification($details));
        dd('done');
    }
}
