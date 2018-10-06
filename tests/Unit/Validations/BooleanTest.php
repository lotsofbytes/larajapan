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
            ['flag' => 'required|boolean']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_boolean()
    {
        return [
            // 文字列
            [['flag' => '1'],     true],
            [['flag' => '0'],     true],

            [['flag' => 'true'],  false],
            [['flag' => 'false'], false],

            // 文字列でない
            [['flag' => 1],       true],
            [['flag' => 0],       true],

            [['flag' => true],    true],
            [['flag' => false],   true],
        ];
    }
}
