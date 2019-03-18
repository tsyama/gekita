<?php

namespace Tests\Feature;

use App\Scenario;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScenarioControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_脚本一覧画面にアクセスできる()
    {
        $response = $this->get("/scenarios");
        $response->assertStatus(200);
    }

    public function test_脚本編集画面にアクセスできる()
    {
        $scenarios = factory(Scenario::class, 3)->create();
        $scenario = $scenarios[0];

        $response = $this->get("/scenarios/{$scenario->id}/edit");

        $response->assertStatus(200);
    }

    public function test_存在しない脚本IDで脚本編集画面にアクセスできない()
    {
        $response = $this->get("/scenarios/1000000/edit");

        $response->assertStatus(500);
    }
}
