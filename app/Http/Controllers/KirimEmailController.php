<?php

namespace App\Http\Controllers;

use App\Mail\kirimEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function Symfony\Component\String\b;

class KirimEmailController extends Controller
{
    public function index()
    {

        $pesan = "<p><b>Simrs</b></p><br/>";
        $pesan .= "<p><img src='https://drive.google.com/uc?export=view&id=1FlNA5Ajf_XG05w1TAT6qmSxwodzT1w1n' width='200'/></p>";
        $pesan .= "<p>Username = coba@gmail.com </p>";
        $pesan .= "<p>password = 123456 </p>";

        $data_email = [
            'subject' => 'Info penting !',
            'sender_name' => 'faran.f4124n@gmail.com',
            'isi' => $pesan
        ];
        Mail::to('faran.f4124n@gmail.com')->send(new kirimEmail($data_email));
        return 'Email terkirim';
    }
}
