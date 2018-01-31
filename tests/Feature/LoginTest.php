<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
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
}
