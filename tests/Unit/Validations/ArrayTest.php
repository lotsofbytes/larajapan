<?php

namespace Tests\Unit\Validations\ArrayValidation;

use Tests\TestCase;
use Validator;

class ArrayTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_array
     */
    public function array_test($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['values' => 'array']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_array()
    {
        return [
            [['values' => null],    false],
            [['values' => ''],      true],
            [['values' => ' '],     true], // space

            [['values' => []],        true],
            [['values' => [1]],       true],
            [['values' => ['a','b']], true],

            [['values' => '[1]'],   false],
            [['values' => 'abcd'],  false],
        ];
    }
}
