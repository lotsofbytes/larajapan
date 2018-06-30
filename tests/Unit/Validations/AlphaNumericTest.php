<?php

namespace Tests\Unit\Validations\AlphaNumeric;

use Tests\TestCase;
use Validator;

class AlphaNumericTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_alpha_numeric
     */
    public function alpha_numeric($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'alpha_num']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_alpha_numeric()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => 'abcd'],  true],
            [['field' => 'ABCD'],  true],
            [['field' => 'ab cd'], false],

            [['field' => '-'],     false],
            [['field' => '_'],     false],

            [['field' => '0'],     true],
            [['field' => '1'],     true],

            [['field' => 'ログイン'],  true],
            [['field' => 'ろぐいん'],  true],
            [['field' => '漢字'],     true],
        ];
    }
}
