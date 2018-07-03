<?php

namespace Tests\Unit\Validations\Before;

use Tests\TestCase;
use Validator;

class BeforeOrEqualTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_before_or_equal
     */
    public function before_or_equal($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'before_or_equal:2018-01-01']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_before_or_equal()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '2018-01-02'],  false],
            [['field' => '2018-01-01'],  true],
            [['field' => '2017-12-31'],  true],

            [['field' => '1/2/18'],  false],
            [['field' => '1/1/18'],  true],
            [['field' => '12/31/17'],  true],
        ];
    }
}
