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
            ['field' => 'required|alpha_dash']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_alpha_dash()
    {
        return [
            [['field' => 'abcd'],       true],
            [['field' => 'ABCD'],       true],
            [['field' => '-'],          true],
            [['field' => '_'],          true],
            [['field' => '0'],          true],
            [['field' => '1'],          true],
            [['field' => 'ログイン'],    true],
            [['field' => 'ろぐいん'],    true],
            [['field' => '漢字'],       true],

            [['field' => 'ab cd'], false],
        ];
    }
}
