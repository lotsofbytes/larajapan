<?php

namespace Tests\Unit\Validations\Exists;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Validator;
use App\User;

class ExistsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
	 * @dataProvider provider_exists
     */
    public function exists($input, $expected)
    {
        // \DB::enableQueryLog();

        // DBに1つだけレコードを作成
        $user = factory(User::class)->create([
            'email' => 'test@example.com'
        ]);

        $v = Validator::make(
            $input,
            ['email' => 'required|exists:users,email']
        );

        $this->assertEquals($expected, $v->passes());

        // print_r(\DB::getQueryLog());
    }

    public function provider_exists()
    {
        return [
            [['email' => 'test@example.com'],    true],

            [['email' => 'test2@example.com'],   false],
        ];
    }
}
