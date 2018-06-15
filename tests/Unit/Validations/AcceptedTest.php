<?php

namespace Tests\Unit\Validations;

use Tests\TestCase;
use Validator;

class AcceptedTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_accepted
     */
    public function accepted($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['terms_of_service' => 'accepted']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_accepted()
    {
        return [
            [['terms_of_service' => null],  false],
            [['terms_of_service' => ''],    false],
            [['terms_of_service' => ' '],   false], // space

            [['terms_of_service' => 'yes'], true],
            [['terms_of_service' => 'no'],  false],

            [['terms_of_service' => 'on'],  true],
            [['terms_of_service' => 'off'], false],

            [['terms_of_service' => '1'],   true],
            [['terms_of_service' => '0'],   false],
        ];
    }
}
