<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\JsonResponse;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendEmailController extends Controller
{
    public static function kirimnotifikasi($data)
    {
        return new JsonResponse($data);
        $user = User::findOrFail($data->id);

        $details = [
            'greeting' => 'Username: ' . $data->name,
            'body' => $data->body,
            'actiontext' => $data->action,
            'actionurl' => $data->url,
            'lastline' => $data->lastline
        ];

        FacadesNotification::send($user, new SendEmailNotification($details));
        return [
            'status' => 'success',
            'message' => 'Register Tersimpan',
        ];
    }
}
