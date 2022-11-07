<x-mail::message>
    # SISTEM INFORMASI LIPA MITRA
    {{ $data_password['title'] }}

    Password : {{ $data_password['password'] }}

    <x-mail::button :url="$data_password['url']" color="success">
        Login
    </x-mail::button>

    Terimakasih
    SISTEM INFORMASI LIPA MITRA
</x-mail::message>
