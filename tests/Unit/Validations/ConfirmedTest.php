<?php

namespace Tests\Unit\Validations\Confirmed;

use Tests\TestCase;
use Validator;

class ConfirmedTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_confirmed
     */
    public function confirmed($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['password' => 'required|confirmed']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_confirmed()
    {
        return [
            [
                [
                    'password' => 'パスワード',
                    'password_confirmation' => 'パスワード'
                ],
                true
            ],
            [
                [
                    'password' => 'パスワード',
                    'password_confirmation' => '違うパスワード'
                ],
                false
            ],
        ];
    }
}
