<?php

namespace Tests\Unit\Validations\Different;

use Tests\TestCase;
use Validator;

class DifferentTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_different
     */
    public function different($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'different:field2']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_different()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [
                [
                    'field'  => '同じ',
                    'field2' => '違う'
                ],
                true
            ],
            [
                [
                    'field'  => '同じ',
                    'field2' => '同じ'
                ],
                false
            ],
        ];
    }
}
