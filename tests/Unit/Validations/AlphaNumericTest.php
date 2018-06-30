<?php

namespace Tests\Unit\Validations\AlphaNumeric;

use Tests\TestCase;
use Validator;

class AlphaNumricTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_alpha_numeric
     */
    public function alpha($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['login' => 'alpha_num']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_alpha_numeric()
    {
        return [
            [['login' => null],    false],
            [['login' => ''],      true],
            [['login' => ' '],     true], // space

            [['login' => 'abcd'],  true],
            [['login' => 'ABCD'],  true],
            [['login' => 'ab cd'], false],

            [['login' => '-'],     false],
            [['login' => '_'],     false],

            [['login' => '0'],     true],
            [['login' => '1'],     true],
        ];
    }
}
