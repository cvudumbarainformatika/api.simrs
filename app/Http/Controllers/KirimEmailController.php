<?php

namespace App\Http\Controllers;

use App\Mail\kirimEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function Symfony\Component\String\b;

class KirimEmailController extends Controller
{
    public static function index($data)
    {

        $pesan = "<p><b>SISTEM INFORMASI LIPA MITRA NUSA</b></p><br/>";
        $pesan .= "<p><img src='https://drive.google.com/uc?export=view&id=1FlNA5Ajf_XG05w1TAT6qmSxwodzT1w1n' width='200'/></p>";
        $pesan .= "<p>Nama Lengkap = " . $data['name'] . " </p>";
        $pesan .= "<p>Email = " . $data['email'] . " </p>";
        $pesan .= "<p>password = 12345678 </p>";

        $data_email = [
            'subject' => 'Info penting !',
            'sender_name' => 'faran.f4124n@gmail.com',
            'isi' => $pesan
        ];
        Mail::to($data['email'])->send(new kirimEmail($data_email));
        // return view('mail.kirimEmail', compact('data_email'));
        return new JsonResponse(['message' => 'Success'], 200);
    }
    public function viewpesan(Request $request)
    {
        $pesan = "<p><b>SISTEM INFORMASI LIPA MITRA NUSA</b></p><br/>";
        $pesan .= "<p><img src='https://drive.google.com/uc?export=view&id=1FlNA5Ajf_XG05w1TAT6qmSxwodzT1w1n' width='200'/></p>";
        $pesan .= "<p>Nama Lengkap = " . $request['name'] . " </p>";
        $pesan .= "<p>Email = " . $request['email'] . " </p>";
        $pesan .= "<p>password = 12345678 </p>";

        $data_email = [
            'subject' => 'Info penting !',
            'sender_name' => 'faran.f4124n@gmail.com',
            'isi' => $pesan
        ];
        return view('mail.kirimEmail', compact('data_email'));
    }
}
