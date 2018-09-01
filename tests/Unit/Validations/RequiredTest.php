<?php

namespace Tests\Unit\Validations\Required;

use Tests\TestCase;
use Validator;

class RequiredTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_required
     */
    public function required($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|string']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_required()
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
            [['field2' => '値がある'], false],
        ];
    }

    /**
     * @test
     * @dataProvider provider_without_required
     */
    public function without_required($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'string']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_without_required()
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
            [['field2' => '値がある'], true], // ここが上と違う
        ];
    }
}
