<?php

namespace Tests\Unit\Validations\RequiredWith;

use Tests\TestCase;
use Validator;

class RequiredWithTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_required_with
     */
    public function required_with($input, $expected)
    {
        $v = Validator::make(
            $input,
            [
                'field' => 'required_with:field1,field2'
            ]
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_required_with()
    {
       return [
            // 'field1'もfield2'も項目がない
            [['field' => null],  true],
            [['field' => ''],    true],
            [['field' => ' '],   true], // space
            [['field' => '値'],  true],

            // 'field1'の項目があるが値がない
            [['field' => null, 'field1' => ''],  true],
            [['field' => '',   'field1' => ''],  true],
            [['field' => ' ',  'field1' => ''],  true], // space
            [['field' => '値', 'field1' => ''],  true],

            // 'field1'の項目があり値がある
            [['field' => null, 'field1' => '値'],  false],
            [['field' => '',   'field1' => '値'],  false],
            [['field' => ' ',  'field1' => '値'],  false], // space
            [['field' => '値', 'field1' => '値'],  true],

            // 'field2'の項目があり値がある
            [['field' => null, 'field2' => '値'],  false],
            [['field' => '',   'field2' => '値'],  false],
            [['field' => ' ',  'field2' => '値'],  false], // space
            [['field' => '値', 'field2' => '値'],  true],

            // 'field1'もfield2'も項目があり値がある
            [['field' => null, 'field1' => '値', 'field2' => '値'],  false],
            [['field' => '',   'field1' => '値', 'field2' => '値'],  false],
            [['field' => ' ',  'field1' => '値', 'field2' => '値'],  false], // space
            [['field' => '値', 'field1' => '値', 'field2' => '値'],  true],
        ];
    }
}
