<?php

namespace Tests\Unit\Validations\NotIn;

use Tests\TestCase;
use Validator;

class NotInTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_not_in
     */
    public function not_in_test($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'not_in:a,b']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_not_in()
    {
        return [
            [['field' => null], true],
            [['field' => ''],   true],
            [['field' => ' '],  true], // space

            [['field' => 'a'],  false],
            [['field' => 'c'],  true],
        ];
    }
}
