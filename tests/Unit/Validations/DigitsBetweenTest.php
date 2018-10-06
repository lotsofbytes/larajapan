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
            ['field' => 'required|digits_between:3,4']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_digits_between()
    {
        return [
            [['field' => '000'],   true],
            [['field' => '0000'],  true],

            [['field' => '00'],    false],
            [['field' => '00000'], false],
            [['field' => 'abcd'],  false],
        ];
    }
}
