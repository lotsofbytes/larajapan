<?php

namespace Tests\Unit\Validations\RequiredIf;

use Tests\TestCase;
use Validator;

class RequiredIfTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_required_if
     */
    public function required_if($input, $expected)
    {
        $v = Validator::make(
            $input,
            [
                'another_field' => 'required',
                'field'         => 'required_if:another_field,値1,値2'
            ]
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_required_if()
    {
       return [
            // 'field'の項目があり、'another_field'の項目があり値もマッチ
            [['field' => null, 'another_field' => '値1'],    false],
            [['field' => '',   'another_field' => '値1'],    false],
            [['field' => ' ',  'another_field' => '値1'],    false], // space
            [['field' => '値', 'another_field' => '値1'],     true],

            [['field' => null, 'another_field' => '値2'],    false],
            [['field' => '',   'another_field' => '値2'],    false],
            [['field' => ' ',  'another_field' => '値2'],    false], // space
            [['field' => '値', 'another_field' => '値2'],     true],

            // 'field'の項目があり、'another_field'の項目があり値はマッチしない
            [['field' => null, 'another_field' => '違う値'], true],
            [['field' => '',   'another_field' => '違う値'], true],
            [['field' => ' ',  'another_field' => '違う値'], true], // space
            [['field' => '値', 'another_field' => '違う値'], true],
        ];
    }
}
