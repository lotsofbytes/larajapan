<?php

namespace Tests\Unit\Validations\Date;

use Tests\TestCase;
use Validator;

class DateTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_date
     */
    public function date($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|date']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_date()
    {
        return [
            [['field' => '10/09/18'],           true], // MM/DD/YY
            [['field' => '2018-09-10'],         true],
            [['field' => '10 September 2018'],  true],
            [['field' => 'September 2018'],     true],

            [['field' => 'now'],    false],
            [['field' => '+1 day'], false],
        ];
    }
}
