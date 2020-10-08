<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions; // 追加
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;


class TrophyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use DatabaseTransactions;

    public function testExample()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
        ->get(route('index'));

        $response->assertStatus(200)
            ->assertViewIs('welcome');


        // $response = $this->get('/'); // 変更(ホーム画面のパスに変更)

        // $response->assertStatus(200)
        //     ->assertViewIs('welcome') // 追加(ここでの'home'は、ホーム画面で使われているビュー名)
        //     ->assertSee('welcome'); // 追加(ホーム画面で表示されているメッセージ)e->assertStatus(200);
    }
}
