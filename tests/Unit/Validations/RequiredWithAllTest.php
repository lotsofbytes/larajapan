<?php

namespace Tests\Unit\Validations\RequiredWithoutAll;

use Tests\TestCase;
use Validator;

class RequiredWithoutAllTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_required_without_all
     */
    public function required_without_all($input, $expected)
    {
        $v = Validator::make(
            $input,
            [
                'field' => 'required_without_all:field1,field2'
            ]
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_required_without_all()
    {
       return [
            // 'field1'もfield2'も項目がない
            [['field' => null],  false],
            [['field' => ''],    false],
            [['field' => ' '],   false], // space
            [['field' => '値'],  true],

            // 'field1'の項目があるが値がない
            [['field' => null, 'field1' => ''],  false],
            [['field' => '',   'field1' => ''],  false],
            [['field' => ' ',  'field1' => ''],  false], // space
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
            [['field' => null, 'field1' => '値', 'field2' => '値'],  true],
            [['field' => '',   'field1' => '値', 'field2' => '値'],  true],
            [['field' => ' ',  'field1' => '値', 'field2' => '値'],  true], // space
            [['field' => '値', 'field1' => '値', 'field2' => '値'],  true],
        ];
    }
}
