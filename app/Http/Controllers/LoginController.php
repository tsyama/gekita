<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index()
    {
        $query = [
            'client_id' => Config::get('google.client_id'),
            'redirect_uri' => 'http://local-gekita.com/login/redirect',
            'scope' => 'https://www.googleapis.com/auth/userinfo.profile',
            'response_type' => 'code',
        ];

        return redirect('https://accounts.google.com/o/oauth2/auth?' . http_build_query($query));
    }

    public function redirect()
    {
        $baseUrl = 'https://accounts.google.com/o/oauth2/token';
        $params = [
            'code' => Input::get('code'),
            'client_id' => Config::get('google.client_id'),
            'client_secret' => Config::get('google.client_secret'),
            'redirect_uri' => 'http://local-gekita.com/login/redirect',
            'grant_type' => 'authorization_code',
        ];

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'content' => http_build_query($params),
                'header' => implode("\r\n", $headers),
            ],
        ];

        $response = json_decode(file_get_contents($baseUrl, false, stream_context_create($options)));

        var_dump($response->access_token);
    }
}
