<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScenarioControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_脚本新規登録APIにPOSTアクセスして脚本が登録できる()
    {
        $postData = [
            'title' => 'test',
            'body' => 'testtest',
        ];
        $response = $this->json('POST', '/api/scenario/', $postData);

        $response->assertStatus(200);
        $response->assertJson([
            'scenario' => [
                'title' => $postData['title'],
                'body' => $postData['body'],
            ],
        ]);
        $this->assertDatabaseHas('scenarios', $postData);
    }

    public function test_脚本新規登録APIに適切なパラメータを渡さなければ422エラー()
    {
        $postData = [
            'body' => 'testtest',
        ];
        $response = $this->json('POST', '/api/scenario/', $postData);

        $response->assertStatus(422);
        $this->assertDatabaseMissing('scenarios', $postData);
    }

    public function test_脚本編集APIにPOSTリクエストして脚本が編集できる()
    {
        $postData = [
            'title' => 'test2',
            'body' => 'testtest2',
        ];
        $response = $this->json('POST', '/api/scenario/', $postData);

        $response->assertStatus(200);
        $response->assertJson([
            'scenario' => [
                'title' => $postData['title'],
                'body' => $postData['body'],
            ],
        ]);
        $this->assertDatabaseHas('scenarios', $postData);

        $scenario = json_decode($response->getContent());
        $nowTime = time();
        $postData['title'] .= $nowTime;
        $postData['body'] .= $nowTime;
        $response = $this->json('PUT', '/api/scenario/' . $scenario->scenario->id, $postData);
        $response->assertStatus(200);
        $response->assertJson([
            'scenario' => [
                'title' => $postData['title'],
                'body' => $postData['body'],
                'id' => $scenario->scenario->id,
            ],
        ]);
        $this->assertDatabaseHas('scenarios', $postData);
    }
}
