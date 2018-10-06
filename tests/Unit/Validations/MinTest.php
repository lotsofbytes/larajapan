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
            ['field' => 'required|min:3']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_min()
    {
        return [
            // 文字列なら長さ
            [['field' => '000'],   true],
            [['field' => '0000'],  true],
            [['field' => 'abcd'],  true],

            [['field' => '00'],    false],

            // 配列なら個数
            [['field' => ['a', 'b', 'c']],           true],
            [['field' => ['a', 'b', 'c', 'd']],      true],
            [['field' => ['a', 'b', 'c', 'd', 'e']], true],

            [['field' => ['a', 'b']],                false],
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
            ['field' => 'required|numeric|min:3'] // numericが必要
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_min_numeric()
    {
        return [
            // 数字なら整数
            [['field' => '3'],     true],
            [['field' => '4'],     true],
            [['field' => '0004'],  true],
            [['field' => '3.9'],   true],

            [['field' => '2'],     false],
        ];
    }

}
