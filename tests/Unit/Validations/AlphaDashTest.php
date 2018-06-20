<?php

namespace Tests\Unit\Validations\AlphaDash;

use Tests\TestCase;
use Validator;

class AlphaDashTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_alpha_dash
     */
    public function alpha_dash($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['login' => 'alpha_dash']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_alpha_dash()
    {
        return [
            [['login' => null],    false],
            [['login' => ''],      true],
            [['login' => ' '],     true], // space

            [['login' => 'abcd'],  true],
            [['login' => 'ABCD'],  true],
            [['login' => 'ab cd'], false],

            [['login' => '-'],     true],
            [['login' => '_'],     true],

            [['login' => '0'],     true],
            [['login' => '1'],     true],
        ];
    }
}
