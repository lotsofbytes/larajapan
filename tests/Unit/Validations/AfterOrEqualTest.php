<?php

namespace Tests\Unit\Validations\AfterOrEqual;

use Tests\TestCase;
use Validator;

class AfterOrEqualTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_after_or_equal
     */
    public function after_or_equal($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|date|after_or_equal:2018-01-01']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_after_or_equal()
    {
        return [
            [['field' => '2018-01-02'], true],
            [['field' => '2018-01-01'], true],
            [['field' => '1/2/18'],     true],
            [['field' => '1/1/18'],     true],

            [['field' => '2017-12-31'], false],
            [['field' => '12/31/17'],   false],
        ];
    }
}
