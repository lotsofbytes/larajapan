<?php

namespace Tests\Unit\Validations\Same;

use Tests\TestCase;
use Validator;

class SameTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_same
     */
    public function same($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|same:field2']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_same()
    {
        return [
            [
                [
                    'field'  => '同じ',
                    'field2' => '同じ'
                ],
                true
            ],
            [
                [
                    'field'  => '同じ',
                    'field2' => '違う'
                ],
                false
            ],
        ];
    }
}
