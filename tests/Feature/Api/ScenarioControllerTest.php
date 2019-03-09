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
            'status' => true,
            'scenario' => [
                'title' => $postData['title'],
                'body' => $postData['body'],
            ],
        ]);
        $this->assertDatabaseHas('scenarios', $postData);
    }

    public function test_脚本新規登録APIに適切なパラメータを渡さなければstatusがfalse()
    {
        $postData = [];
        $response = $this->json('POST', '/api/scenario/', $postData);

        $response->assertStatus('200');
        $response->assertJson([
            'status' => false,
        ]);
    }
}
