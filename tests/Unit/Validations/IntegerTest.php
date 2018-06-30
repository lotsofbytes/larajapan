<?php

namespace Tests\Unit\Validations\Integer;

use Tests\TestCase;
use Validator;

class IntegerTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_integer
     */
    public function integer($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['quantity' => 'integer']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_integer()
    {
        return [
            [['quantity' => null],    false],
            [['quantity' => ''],      true],
            [['quantity' => ' '],     true], // space

            [['quantity' => '0'],     true],
            [['quantity' => '1'],     true],

            [['quantity' => 0],       true],
            [['quantity' => 1],       true],
            [['quantity' => -1],      true],

            [['quantity' => 'abcd'],  false],
        ];
    }
}
