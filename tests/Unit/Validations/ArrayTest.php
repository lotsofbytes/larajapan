<?php

namespace Tests\Unit\Validations;

use Tests\TestCase;
use Validator;

class ArrayTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_validate
     */
    public function array($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['values' => 'array']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_validate()
    {
        return [
            [['values' => null], false],
            [['values' => ''], true],
        ];
    }
}
