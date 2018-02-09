<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseTransactions;

use Auth;
use App\User;


class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_view_login()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_user_cannot_view_home()
    {
        $this->get('home')
        	->assertRedirect('login');
    }

    /** @test */
    public function valid_user_can_login()
    {
        // ユーザーを1つ作成
        $user = factory(User::class)->create([
            'password'  => bcrypt('test1111')
        ]);

        // まだ、認証されていないことを確認
        $this->assertFalse(Auth::check());

        // ログインを実行
        $response = $this->post('login', [
            'email'    => $user->email,
            'password' => 'test1111'
        ]);

        // 認証されていることを確認
        $this->assertTrue(Auth::check());

        // ログイン後にホームページにリダイレクトされるのを確認
        $response->assertRedirect('home');
    }

    /** @test */
    public function invalid_user_cannot_login()
    {
        // ユーザーを1つ作成
        $user = factory(User::class)->create([
            'password'  => bcrypt('test1111')
        ]);

        // まだ、認証されていないことを確認
        $this->assertFalse(Auth::check());

        // 異なるパスワードでログイン
        $response = $this->post('login', [
            'email'    => $user->email,
            'password' => 'test2222'
        ]);

        // 認証失敗で、認証されていない
        $this->assertFalse(Auth::check());

        // セッションにエラーを含むことを確認
        $response->assertSessionHasErrors(['email']);

        // エラメッセージを確認
        $this->assertEquals('メールアドレスあるいはパスワードが一致しません',
            session('errors')->first('email'));
    }

    /** @test */
    public function logout()
    {
        // ユーザーを1つ作成
        $user = factory(User::class)->create();

        // 認証済み、つまりログイン済みしたことにする
        $this->actingAs($user);

        // 認証されていること確認
        $this->assertTrue(Auth::check());

        // ログアウトを実行
        $response = $this->post('logout');

        // 認証されていない
        $this->assertFalse(Auth::check());

        // Welcomeページにリダイレクトすることを確認
        $response->assertRedirect('/');
    }
}
