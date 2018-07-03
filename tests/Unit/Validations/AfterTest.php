<?php

namespace Tests\Unit\Validations\After;

use Tests\TestCase;
use Validator;

class AfterTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_after
     */
    public function after($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'after:2018-01-01']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_after()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '2018-01-02'],  true],
            [['field' => '2018-01-01'],  false],
            [['field' => '2017-12-31'],  false],

            [['field' => '1/2/18'],  true],
            [['field' => '1/1/18'],  false],
            [['field' => '12/31/17'],  false],
        ];
    }
}
