<?php

namespace Tests\Unit\Validations\Filled;

use Tests\TestCase;
use Validator;

class FilledTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_filled
     */
    public function filled($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'filled']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_filled()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      false],
            [['field' => ' '],     false], // space

            [['field'  => '値がある'], true],

            // 'field'の項目はない
            [['field2' => '値がある'], true],
        ];
    }
}
