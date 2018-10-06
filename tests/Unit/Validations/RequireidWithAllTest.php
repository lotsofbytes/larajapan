<?php

namespace Tests\Unit\Validations\RequiredWithAll;

use Tests\TestCase;
use Validator;

class RequiredWithAllTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_required_with_all
     */
    public function required_with_all($input, $expected)
    {
        $v = Validator::make(
            $input,
            [
                'field' => 'required_with_all:field1,field2'
            ]
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_required_with_all()
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
            [['field' => null, 'field1' => '値'],  true],
            [['field' => '',   'field1' => '値'],  true],
            [['field' => ' ',  'field1' => '値'],  true], // space
            [['field' => '値', 'field1' => '値'],  true],

            // 'field2'の項目があり値がある
            [['field' => null, 'field2' => '値'],  true],
            [['field' => '',   'field2' => '値'],  true],
            [['field' => ' ',  'field2' => '値'],  true], // space
            [['field' => '値', 'field2' => '値'],  true],

            // 'field1'もfield2'も項目があり値がある
            [['field' => null, 'field1' => '値', 'field2' => '値'],  false],
            [['field' => '',   'field1' => '値', 'field2' => '値'],  false],
            [['field' => ' ',  'field1' => '値', 'field2' => '値'],  false], // space
            [['field' => '値', 'field1' => '値', 'field2' => '値'],  true],
        ];
    }
}
