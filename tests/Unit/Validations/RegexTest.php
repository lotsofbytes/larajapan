<?php

namespace Tests\Unit\Validations\Regex;

use Tests\TestCase;
use Validator;

class RegexTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_regex
     */
    public function regex_test($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|regex:/^([a-z]+)$/']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_regex()
    {
        return [
            [['field' => 'abcd'],  true],

            [['field' => 'ABCD'],  false],
            [['field' => ' abcd'], false],
        ];
    }
}
