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
    public function required_age($input, $expected)
    {
        Validator::extendImplicit('required_age', function ($attribute, $value, $parameters) {
           return ((strlen($value) > 0) || ((int)$parameters[0] > 0));
        });

        $age_group = $input['age_group'];

        $v = Validator::make($input, [
            'date_birth' => 'required_age:" . $age_group . "|date'
        ]);

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_validate()
    {
        return [
            [['date_birth' => '2018-01-01', 'age_group' => '0'], true],
            [['date_birth' => '2018-01-45', 'age_group' => '0'], false],
            [['date_birth' => '', 'age_group' => '5'], true],
            [['date_birth' => '', 'age_group' => '0'], false]
        ];
    }
}
