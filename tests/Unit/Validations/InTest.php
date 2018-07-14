<?php

namespace Tests\Unit\Validations\In;

use Tests\TestCase;
use Validator;

class InTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_in
     */
    public function in_test($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'in:a']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_in()
    {
        return [
            [['field' => null], false],
            [['field' => ''],   true],
            [['field' => ' '],  true], // space

            [['field' => 'a'],  true],
            [['field' => 'b'],  false],
        ];
    }
}
