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
            [['login' => ' '], true], // TrimStringを期待して？

            [['login' => 'abcd'], true],
            [['login' => 'ABCD'], true],
            [['login' => 'ab cd'], false],

            [['login' => '-'], false],
            [['login' => '_'], false],

            [['login' => '0'], false],
            [['login' => '1'], false],
        ];
    }
}
