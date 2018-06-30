<?php

namespace Tests\Unit\Validations\Alpha;

use Tests\TestCase;
use Validator;

class AlphaTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_alpha
     */
    public function alpha($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'alpha']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_alpha()
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

            [['field' => '0'],     false],
            [['field' => '1'],     false],

            [['field' => 'ログイン'],  true],
            [['field' => 'ろぐいん'],  true],
            [['field' => '漢字'],     true],
        ];
    }
}
