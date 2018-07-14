<?php

namespace Tests\Unit\Validations\DigitsBetween;

use Tests\TestCase;
use Validator;

class DigitsBetweenTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_digits_between
     */
    public function digits_between($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'digits_between:3,4']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_digits_between()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '00'],    false],
            [['field' => '000'],   true],
            [['field' => '0000'],  true],
            [['field' => '00000'], false],

            [['field' => 'abcd'],  false],
        ];
    }
}
