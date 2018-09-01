<?php

namespace Tests\Unit\Validations\Present;

use Tests\TestCase;
use Validator;

class PresentTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_present
     */
    public function present($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'present|string']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_present()
    {
        return [
            // 'field'の項目がある
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '値がある'], true],
            [['field' => '1234'], true],
            [['field' => 1234], false],

            // 'field'の項目はない
            [['field2' => '値がある'], false],
        ];
    }

    /**
     * @test
     * @dataProvider provider_without_present
     */
    public function without_present($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'string']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_without_present()
    {
        return [
            // 'field'の項目がある
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '値がある'], true],
            [['field' => '1234'], true],
            [['field' => 1234], false],

            // 'field'の項目はない
            [['field2' => '値がある'], true], // ここが上と違う
        ];
    }
}
