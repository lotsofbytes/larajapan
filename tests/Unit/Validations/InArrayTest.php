<?php

namespace Tests\Unit\Validations\InArray;

use Tests\TestCase;
use Validator;

class InArrayTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_in_array
     */
    public function in_array($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|in_array:field2.*'] // field2だけではエラーとなる。*が必要。
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_in_array()
    {
        return [
            [
                [
                    'field'  => '犬',
                    'field2' => ['犬', '猫']
                ],
                true
            ],
            [
                [
                    'field'  => '狸',
                    'field2' => ['犬', '猫']
                ],
                false
            ],
        ];
    }
}
