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
            ['field' => 'nullable']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_nullable()
    {
        return [
            [['field' => null],    true],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field'  => '値がある'], true],

            // 'field'の項目はない
            [['field2' => '値がある'], true],
        ];
    }
}
