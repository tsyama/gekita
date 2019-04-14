<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    private $user;

    public function __construct(User $user)
    {
//        $this->middleware('guest:admin')->except('logout');
        $this->user = $user;
    }

    public function index()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirect()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::firstOrNew(['email' => $googleUser->email]);
        if (!$user->exists) {
            $user->name = $googleUser->getNickName() ?? $googleUser->getName() ?? $googleUser->getNick();
            $user->email = $googleUser->email;
            $user->save();
        }
        Auth::login($user);
        $user->setToken();
        return redirect('/scenarios');
    }
}
