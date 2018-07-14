<?php

namespace Tests\Unit\Validations\Min;

use Tests\TestCase;
use Validator;

class MinTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_min
     */
    public function min($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'min:3']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_min()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            // 文字列なら長さ
            [['field' => '00'],    false],
            [['field' => '000'],   true],
            [['field' => '0000'],  true],
            [['field' => 'abcd'],  true],

            // 配列なら個数
            [['field' => ['a', 'b']],                false],
            [['field' => ['a', 'b', 'c']],           true],
            [['field' => ['a', 'b', 'c', 'd']],      true],
            [['field' => ['a', 'b', 'c', 'd', 'e']], true],
        ];
    }

    /**
     * @test
     * @dataProvider provider_min_numeric
     */
    public function min_numeric($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'numeric|min:3'] // numericが必要
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_min_numeric()
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
        ];
    }

}
