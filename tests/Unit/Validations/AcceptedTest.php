<?php

namespace Tests\Unit\Validations;

use Tests\TestCase;
use Validator;

class AcceptedTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_validate
     */
    public function accepted($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['terms_of_service' => 'accepted']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_validate()
    {
        return [
            [['terms_of_service' => 'on'], true],
            [['terms_of_service' => '1'], true],
            [['terms_of_service' => 'off'], false],
            [['terms_of_service' => '0'], false],
            [['terms_of_service' => ''], false],
        ];
    }
}
