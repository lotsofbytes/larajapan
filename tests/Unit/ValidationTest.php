<?php

namespace Tests\Unit;

use Tests\TestCase;
use Validator;

class ValidationTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_validate
     */
    public function required_page($input, $expected)
    {
        Validator::extendImplicit('required_age', function ($attribute, $value, $parameters) {
           return ((strlen($value) > 0) || ($parameters[0] > 0));
        });

        $v = Validator::make($input, ['date_birth' => 'required_page:age_group']);

        $actual = !$v->fails();

        $this->assertEquals($expected, $actual);
    }

    public function provider_validate()
    {
        return [
            [['date_birth' => '2018-01-01', 'age_group' => null], true]
        ];
    }
}
