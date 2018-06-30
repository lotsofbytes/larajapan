<?php

namespace Tests\Unit\Validations\Accepted;

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
            ['field' => 'accepted']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_accepted()
    {
        return [
            [['field' => null],  false],
            [['field' => ''],    false],
            [['field' => ' '],   false], // space

            [['field' => 'yes'], true],
            [['field' => 'no'],  false],

            [['field' => 'on'],  true],
            [['field' => 'off'], false],

            [['field' => '1'],   true],
            [['field' => '0'],   false],
        ];
    }
}
