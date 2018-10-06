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
            ['quantity' => 'required|integer']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_integer()
    {
        return [
            // 文字列
            [['quantity' => '0'],     true],
            [['quantity' => '1'],     true],
            [['quantity' => '-1'],    true],

            [['quantity' => 'abcd'],  false],
            [['quantity' => '0001'],  false], // numericならtrue
            [['quantity' => '1.1'],   false],

            // 文字列でない
            [['quantity' => 0],     true],
            [['quantity' => 1],     true],
            [['quantity' => -1],    true],

            [['quantity' => 1.1],   false],
        ];
    }
}
