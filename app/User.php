<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const TOKEN_LENGTH = 16;

    private $isVerified = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'access_token',
    ];

    public function setToken()
    {
        $token = bin2hex(openssl_random_pseudo_bytes(self::TOKEN_LENGTH));
        $this->access_token = $token;
        $this->save();
    }

    /**
     * @param $token
     * @return bool
     */
    public function verify($token)
    {
        if ($token === $this->access_token) {
            $this->isVerified = true;
        }
        return $this->isVerified;
    }

    public function getScenarios()
    {
        $scenarios = Scenario::where('user_id', $this->id)
            ->get();
        return $scenarios;
    }
}
