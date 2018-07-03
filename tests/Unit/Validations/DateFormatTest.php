<?php

namespace Tests\Unit\Validations\DateFormat;

use Tests\TestCase;
use Validator;

class DateFormatTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_date_format
     */
    public function date_format($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'date_format:Y-m-d']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_date_format()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '2018-01-01'],  true],
            [['field' => '1/1/18'],  false],
        ];
    }
}
