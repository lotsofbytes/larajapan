<?php

namespace Tests\Unit\Validations\Same;

use Tests\TestCase;
use Validator;

class SameTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_same
     */
    public function same($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'same:field2']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_same()
    {
        return [
            [['field' => null],    true],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => 'foo', 'field2' => 'not foo'],  false],
            [['field' => 'foo', 'field2' => 'foo'],      true],
        ];
    }
}
