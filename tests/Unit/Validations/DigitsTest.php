<?php

namespace Tests\Unit\Validations\Digits;

use Tests\TestCase;
use Validator;

class DigitsTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_digits
     */
    public function digits($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|digits:4']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_digits()
    {
        return [
            [['field' => '0000'],  true],

            [['field' => '000'],   false],
            [['field' => '00000'], false],
            [['field' => 'abcd'],  false],
        ];
    }
}
