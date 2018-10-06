<?php

namespace Tests\Unit\Validations\DateEquals;

use Tests\TestCase;
use Validator;

class DateEqualsTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_date_equals
     */
    public function date_equals($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|date|date_equals:2018-01-01']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_date_equals()
    {
        return [
            [['field' => '2018-01-01'],  true],
            [['field' => '1/1/18'],     true],

            [['field' => '2018-01-02'], false],
            [['field' => '2017-12-31'], false],
            [['field' => '1/2/18'],     false],
            [['field' => '12/31/17'],   false],
        ];
    }
}
