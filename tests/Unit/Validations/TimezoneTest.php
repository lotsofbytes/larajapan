<?php

namespace Tests\Unit\Validations\Timezone;

use Tests\TestCase;
use Validator;

class TimezoneTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_timezone
     */
    public function timezone($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'timezone']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_timezone()
    {
        return [
            [['field' => null],            false],
            [['field' => ''],              true],
            [['field' => ' '],             true], // space

            [['field' => 'Japan'],         true],
            [['field' => 'Asia/Tokyo'],    true],
            [['field' => 'Asia/Osaka'],    false],
        ];
    }
}
