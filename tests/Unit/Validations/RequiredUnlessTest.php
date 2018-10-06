<?php

namespace Tests\Unit\Validations\RequiredUnless;

use Tests\TestCase;
use Validator;

class RequiredUnlessTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_required_unless
     */
    public function required_unless($input, $expected)
    {
        $v = Validator::make(
            $input,
            [
                'another_field' => 'required',
                'field'         => 'required_unless:another_field,値1,値2'
            ]
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_required_unless()
    {
       return [
            // 'field'の項目があり、'another_field'の項目があり値もマッチ
            [['field' => null, 'another_field' => '値1'],    true],
            [['field' => '',   'another_field' => '値1'],    true],
            [['field' => ' ',  'another_field' => '値1'],    true], // space
            [['field' => '値', 'another_field' => '値1'],     true],

            [['field' => null, 'another_field' => '値2'],    true],
            [['field' => '',   'another_field' => '値2'],    true],
            [['field' => ' ',  'another_field' => '値2'],    true], // space
            [['field' => '値', 'another_field' => '値2'],     true],

            // 'field'の項目があり、'another_field'の項目があり値はマッチしない
            [['field' => null, 'another_field' => '違う値'], false],
            [['field' => '',   'another_field' => '違う値'], false],
            [['field' => ' ',  'another_field' => '違う値'], false], // space
            [['field' => '値', 'another_field' => '違う値'], true],
        ];
    }

}
