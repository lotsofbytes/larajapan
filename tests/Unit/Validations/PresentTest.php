<?php

namespace Tests\Unit\Validations\Present;

use Tests\TestCase;
use Validator;

class PresentTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_present
     */
    public function present($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'present']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_present()
    {
        return [
            [['field' => null],    true],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field'  => '値がある'], true],

            // 'field'の項目はない
            [['field2' => '値がある'], false],
        ];
    }
}
