<?php

namespace Tests\Unit\Validations\Max;

use Tests\TestCase;
use Validator;

class MaxTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_max
     */
    public function max($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|max:4']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_max()
    {
        return [
            // 文字列なら長さ
            [['field' => '000'],   true],
            [['field' => '0000'],  true],
            [['field' => 'abcd'],  true],

            [['field' => '00000'], false],

            // 配列なら個数
            [['field' => ['a', 'b', 'c']],           true],
            [['field' => ['a', 'b', 'c', 'd']],      true],

            [['field' => ['a', 'b', 'c', 'd', 'e']], false],
        ];
    }

    /**
     * @test
     * @dataProvider provider_max_numeric
     */
    public function max_numeric($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|numeric|max:4'] // numericが必要
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_max_numeric()
    {
        return [
            // 数字なら整数
            [['field' => '3'],     true],
            [['field' => '4'],     true],
            [['field' => '0004'],  true],
            [['field' => '3.9'],   true],

            [['field' => '4.9'],   false]
        ];
    }

}
