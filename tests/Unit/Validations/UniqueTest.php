<?php

namespace Tests\Unit\Validations\Unique;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\Rule;
use Validator;
use App\User;

class UniqueTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
	 * @dataProvider provider_unique
     */
    public function unique($input, $expected)
    {
        // \DB::enableQueryLog();

        // DBに1つだけレコードを作成
        $user = factory(User::class)->create([
            'email' => 'test@example.com'
        ]);

        $v = Validator::make(
            $input,
            ['email' => 'unique:users,email']
        );

        $this->assertEquals($expected, $v->passes());

        // print_r(\DB::getQueryLog());
    }

    public function provider_unique()
    {
        return [
            [['email' => null],    true],
            [['email' => ''],      true],
            [['email' => ' '],     true], // space

            [['email' => 'test@example.com'],    false],
            [['email' => 'test2@example.com'],   true],

        ];
    }

    /**
     * @test
     * @dataProvider provider_uniqueIgnore
     */
    public function uniqueIgnore($input, $expected)
    {
        // \DB::enableQueryLog();

        // DBに1つだけレコードを作成
        $user = factory(User::class)->create([
            'email' => 'test@example.com'
        ]);

        $v = Validator::make(
            $input,
            ['email' => 'unique:users,email,' . $user->email . ',email']
        );

        $this->assertEquals($expected, $v->passes());

        // print_r(\DB::getQueryLog());
    }

    /**
     * @test
     * @dataProvider provider_uniqueIgnore
     */
    public function uniqueRuleIgnore($input, $expected)
    {
        // \DB::enableQueryLog();

        // DBに1つだけレコードを作成
        $user = factory(User::class)->create([
            'email' => 'test@example.com'
        ]);

        $v = Validator::make(
            $input,
            ['email' => Rule::unique('users')->ignore($user->email, 'email')]
        );

        $this->assertEquals($expected, $v->passes());

        // print_r(\DB::getQueryLog());
    }

    public function provider_uniqueIgnore()
    {
        return [
            [['email' => null],    true],
            [['email' => ''],      true],
            [['email' => ' '],     true], // space

            [['email' => 'test@example.com'],    true],
            [['email' => 'test2@example.com'],   true],

        ];
    }

}
