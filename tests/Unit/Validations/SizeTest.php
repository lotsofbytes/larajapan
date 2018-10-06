<?php

namespace Tests\Unit\Validations\Size;

use Tests\TestCase;
use Validator;

class SizeTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_size
     */
    public function size($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|size:4']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_size()
    {
        return [
            // 数字なら整数
            [['field' => '4'],     false], // numericのチェックがないからダメ

            // 文字列なら長さ
            [['field' => '0000'],  true],
            [['field' => 'abcd'],  true],

            [['field' => '000'],   false],
            [['field' => '00000'], false],


            // 配列なら個数
            [['field' => ['a', 'b', 'c', 'd']], true],

            [['field' => ['a', 'b', 'c']],      false],
        ];
    }

    /**
     * @test
     * @dataProvider provider_size_numeric
     */
    public function size_numeric($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|numeric|size:4'] // numericが必要
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_size_numeric()
    {
        return [
            // 数字なら整数
            [['field' => '4'],     true],
            [['field' => '0004'],  true],

            [['field' => '3'],     false],
            [['field' => '4.9'],   false]
        ];
    }

}
