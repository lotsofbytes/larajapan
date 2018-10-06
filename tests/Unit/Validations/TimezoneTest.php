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
            ['field' => 'required|timezone']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_timezone()
    {
        return [
            [['field' => 'Japan'],         true],
            [['field' => 'Asia/Tokyo'],    true],

            [['field' => 'Asia/Osaka'],    false], // 存在しない
        ];
    }
}
