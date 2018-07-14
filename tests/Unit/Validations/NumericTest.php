<?php

namespace Tests\Unit\Validations\Numeric;

use Tests\TestCase;
use Validator;

class NumericTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_numeric
     */
    public function numeric($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['number' => 'numeric']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_numeric()
    {
        return [
            [['number' => null],    false],
            [['number' => ''],      true],
            [['number' => ' '],     true], // space

            [['number' => '0'],     true],
            [['number' => '1'],     true],
            [['number' => '0001'],  true], // integerではfalse
            [['number' => '-1'],    true],
            [['number' => '1.1'],   true],

            [['number' => 'abcd'],  false],
        ];
    }
}
