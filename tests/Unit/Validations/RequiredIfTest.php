<?php

namespace Tests\Unit\Validations\Required;

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
            ['field2' => 'required_if:field,値']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_required_if()
    {
       return [
            // 'field2'の項目があるが、'field'の項目はない
            [['field2' => null],    true],
            [['field2' => ''],      true],
            [['field2' => ' '],     true], // space

            // 'field2'の項目があり、'field'の項目があるが値がない
            [['field2' => null, 'field' => null],    true],
            [['field2' => '',   'field' => ''],      true],
            [['field2' => ' ',  'field' => ' '],     true], // space

            // 'field2'の項目があり、'field'の項目があり値もマッチ
            [['field2' => null, 'field' => '値'],    false],
            [['field2' => '',   'field' => '値'],    false],
            [['field2' => ' ',  'field' => '値'],    false], // space
            [['field2' => '値', 'field' => '値'],     true],

            // 'field2'の項目があり、'field'の項目があり値はマッチしない
            [['field2' => null, 'field' => '違う値'], true],
            [['field2' => '',   'field' => '違う値'], true],
            [['field2' => ' ',  'field' => '違う値'], true], // space
            [['field2' => '値', 'field' => '違う値'], true],
        ];
    }

}
