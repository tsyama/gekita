<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scenario;

class ScenarioController extends Controller
{
    public function index()
    {
        $scenarios = Scenario::orderBy('updated_at', 'desc')
            ->get();
        return view('scenario.index', compact('scenarios'));
    }

    public function edit(Request $request, $scenarioId)
    {
        $scenario = Scenario::find($scenarioId);

        return view('scenario.edit', compact('scenario'));
    }
}
