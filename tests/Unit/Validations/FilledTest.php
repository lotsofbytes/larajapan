<?php

namespace Tests\Unit\Validations\Filled;

use Tests\TestCase;
use Validator;

class FilledTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_filled
     */
    public function filled($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'filled|string']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_filled()
    {
        return [
            // 'field'の項目がある
            [['field' => null],    false],
            [['field' => ''],      false],
            [['field' => ' '],     false], // space

            [['field' => '値がある'], true],
            [['field' => '1234'], true],
            [['field' => 1234], false],

            // 'field'の項目はない
            [['field2' => '値がある'], true],
        ];
    }

    /**
     * @test
     * @dataProvider provider_without_filled
     */
    public function without_filled($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'string']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_without_filled()
    {
        return [
            // 'field'の項目がある
            [['field' => null],    false],
            [['field' => ''],      true], // ここが上と違う
            [['field' => ' '],     true], // ここが上と違う

            [['field' => '値がある'], true],
            [['field' => '1234'], true],
            [['field' => 1234], false],

            // 'field'の項目はない
            [['field2' => '値がある'], true],
        ];
    }
}
