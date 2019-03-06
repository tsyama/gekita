<?php

namespace App\Http\Controllers\Api;

use App\Scenario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScenarioController extends Controller
{
    public function store(Request $request)
    {
        $scenario = new Scenario;
        $scenario->title = $request->title;
        $scenario->body = $request->body;
        $scenario->saveOrFail();
    }
}
