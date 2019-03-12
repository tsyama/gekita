<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreScenario;
use App\Scenario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScenarioController extends Controller
{
    /**
     * 脚本一覧取得API
     * @return array
     */
    public function index()
    {
        // TODO: 取得件数の制限およびページネーション
        $scenarios = Scenario::all();
        return [
            'scenarios' => $scenarios,
        ];
    }

    /**
     * 脚本新規登録API
     * @param StoreScenario $request
     * @return array
     * @throws \Throwable
     */
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

    /**
     * 脚本編集API
     * @param StoreScenario $request
     * @param $id
     * @return array
     */
    public function update(StoreScenario $request, $id)
    {
        $scenario = Scenario::find($id);
        $scenario->title = $request->title;
        $scenario->body = $request->body;
        $scenario->saveOrFail();

        return [
            'scenario' => $scenario,
        ];
    }
}
