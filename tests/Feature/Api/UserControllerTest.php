<?php

namespace Tests\Feature\Api;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_ユーザー脚本一覧取得APIを実行できる()
    {
        $user = factory(User::class)->create();

        $response = $this->json('GET', "/api/user/{$user->id}/scenarios", [
            'token' => $user->access_token,
        ]);
        $response->assertStatus(200);
    }

    public function test_ユーザー脚本一覧取得時、トークンを渡していなければ403エラー()
    {
        $user = factory(User::class)->create();

        $response = $this->json('GET', "/api/user/{$user->id}/scenarios");
        $response->assertStatus(403);
    }
}
