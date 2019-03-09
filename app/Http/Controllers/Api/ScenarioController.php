<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreScenario;
use App\Scenario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScenarioController extends Controller
{
    public function store(StoreScenario $request)
    {
        $scenario = new Scenario;
        $scenario->title = $request->title;
        $scenario->body = $request->body;
        $scenario->saveOrFail();

        return [
            'scenario' => $scenario,
        ];
    }
}
