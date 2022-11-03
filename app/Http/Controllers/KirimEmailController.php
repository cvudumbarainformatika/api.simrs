<?php

namespace App\Http\Controllers;

use App\Mail\kirimEmail;
use App\Mail\PesanEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Test;

use function Symfony\Component\String\b;

class KirimEmailController extends Controller
{
    public static function index($data)
    {
        $nama = $data['name'];
        $email = $data['email'];

        $data_email = [
            'title' => 'Info penting !!!',
            'url' => 'http://localhost:9000/login',
            'nama' => $nama,
            'email' => $email,
            'password' => '12345678'

        ];
        Mail::to($data['email'])->send(new PesanEmail($data_email));
        // return view('mail.kirimEmail', compact('data_email'));
        return new JsonResponse(['message' => 'Success'], 200);
    }
    public function viewpesan(Request $request)
    {

        $nama = 'nama';
        $email = 'email';

        $data_email = [
            'title' => 'Info penting !!!',
            'url' => 'http://localhost:9000/login',
            'nama' => $nama,
            'email' => $email,
            'password' => '12345678'

        ];
        return view('mail.kirimpesan', compact('data_email'));
    }
}
