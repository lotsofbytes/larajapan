<?php

namespace Tests\Unit\Validations\Between;

use Tests\TestCase;
use Validator;

class BetweenTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_between
     */
    public function between($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'between:3,4']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_between()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            // 文字列なら長さ
            [['field' => '00'],    false],
            [['field' => '000'],   true],
            [['field' => '0000'],  true],
            [['field' => '00000'], false],
            [['field' => 'abcd'],  true],

            // 配列なら個数
            [['field' => ['a', 'b']],                false],
            [['field' => ['a', 'b', 'c']],           true],
            [['field' => ['a', 'b', 'c', 'd']],      true],
            [['field' => ['a', 'b', 'c', 'd', 'e']], false],
        ];
    }

    /**
     * @test
     * @dataProvider provider_between_numeric
     */
    public function between_numeric($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'numeric|between:3,4'] // numericが必要
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_between_numeric()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            // 数字なら整数
            [['field' => '2'],     false],
            [['field' => '3'],     true],
            [['field' => '4'],     true],
            [['field' => '0004'],  true],
            [['field' => '3.9'],   true],
            [['field' => '4.9'],   false]
        ];
    }

}
