<?php

namespace Tests\Unit\Validations;

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
        Validator::extendImplicit('required_age', function ($attribute, $value, $parameters, $validator) {
            $values = $validator->getData();

            $date_birth = $value;
            $age_group = $values['age_group'] ?? '';

            return ((strlen($date_birth) > 0) || ((int)$age_group > 0));
        });

        $v = Validator::make($input, [
            'date_birth' => 'required_age:age_group'
        ]);

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_validate()
    {
        return [
            [['date_birth' => '2018-01-01', 'age_group' => '0'], true],
            [['date_birth' => '2018-01-01'], true],
            [['date_birth' => '', 'age_group' => '5'], true],
            [['date_birth' => '', 'age_group' => '0'], false]
        ];
    }
}
