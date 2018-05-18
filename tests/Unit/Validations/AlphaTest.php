<?php

namespace Tests\Unit\Validations;

use Tests\TestCase;
use Validator;

class AlphaTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_validate
     */
    public function alpha($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['login' => 'alpha']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_validate()
    {
        return [
            [['login' => null], false],
            [['login' => ''], true],
            [['login' => 'abcd'], true],
            [['login' => 'abcd=+-'], false],
            [['login' => '1234'], false],
        ];
    }
}
