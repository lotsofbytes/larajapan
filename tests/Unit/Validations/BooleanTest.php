<?php

namespace Tests\Unit\Validations\Boolean;

use Tests\TestCase;
use Validator;

class BooleanTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_boolean
     */
    public function boolean($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['flag' => 'boolean']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_boolean()
    {
        return [
            [['flag' => null],    false],
            [['flag' => ''],      true],
            [['flag' => ' '],     true], // space

            [['flag' => true],    true],
            [['flag' => false],   true],

            [['flag' => 'true'],  false],
            [['flag' => 'false'], false],

            [['flag' => 1],       true],
            [['flag' => 0],       true],

            [['flag' => '1'],     true],
            [['flag' => '0'],     true],

        ];
    }
}
