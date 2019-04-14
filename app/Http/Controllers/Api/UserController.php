<?php

namespace App\Http\Controllers\Api;

use App\Scenario;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UserController extends Controller
{
    public function getScenarios(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        if (!$user->verify($request->token)) {
            throw new AccessDeniedHttpException();
        }
        $scenarios = $user->getScenarios();
        return ['scenarios' => $scenarios];
    }
}
