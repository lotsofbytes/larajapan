<?php

namespace Tests\Unit\Validations\String;

use Tests\TestCase;
use Validator;

class StringTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_string
     */
    public function string($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['string' => 'string']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_string()
    {
        return [
            [['string' => null],    false],
            [['string' => ''],      true],
            [['string' => ' '],     true], // space

            [['string' => 'abcd'],  true],
            [['string' => '0'],     true],
            [['string' => '1'],     true],

            [['string' => 0],       false],
            [['string' => 1],       false],

            [['string' => true],    false],
            [['string' => false],   false],
        ];
    }
}