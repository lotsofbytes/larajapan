<?php

namespace Tests\Unit\Validations\Required;

use Tests\TestCase;
use Validator;

class RequiredTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_required
     */
    public function required($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_required()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      false],
            [['field' => ' '],     false], // space

            [['field'  => '値がある'], true],

            // 'field'の項目はない
            [['field2' => '値がある'], false],
        ];
    }
}
