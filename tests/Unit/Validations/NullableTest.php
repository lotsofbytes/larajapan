<?php

namespace Tests\Unit\Validations\Nullable;

use Tests\TestCase;
use Validator;

class NullableTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_nullable
     */
    public function nullable($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'nullable|string']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_nullable()
    {
        return [
            // 'field'の項目がある
            [['field' => null],    true],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '値がある'], true],
            [['field' => '1234'], true],
            [['field' => 1234], false],

            // 'field'の項目はない
            [['field2' => '値がある'], true],
        ];
    }

    /**
     * @test
     * @dataProvider provider_without_nullable
     */
    public function without_nullable($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'string'] // nullableがないとき
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_without_nullable()
    {
        return [
            // 'field'の項目がある
            [['field' => null],    false], // ここが上と違う
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '値がある'], true],
            [['field' => '1234'], true],
            [['field' => 1234], false],

            // 'field'の項目はない
            [['field2' => '値がある'], true],
        ];
    }
}
