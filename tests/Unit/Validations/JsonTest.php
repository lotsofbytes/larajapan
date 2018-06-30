<?php

namespace Tests\Unit\Validations\Json;

use Tests\TestCase;
use Validator;

class JsonTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_json
     */
    public function json_test($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['values' => 'json']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_json()
    {
        return [
            [['values' => null],    false],
            [['values' => ''],      true],
            [['values' => ' '],     true], // space

            [['values' => '{}'],      true],
            [['values' => '{"a":1}'], true],

            [['values' => 'abcd'],  false],
        ];
    }
}
