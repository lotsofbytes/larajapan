<?php

namespace Tests\Unit\Validations\Before;

use Tests\TestCase;
use Validator;

class BeforeTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_before
     */
    public function before($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|date|before:2018-01-01']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_before()
    {
        return [
            [['field' => '2017-12-31'], true],
            [['field' => '12/31/17'],   true],

            [['field' => '2018-01-02'], false],
            [['field' => '2018-01-01'], false],
            [['field' => '1/2/18'],     false],
            [['field' => '1/1/18'],     false],
        ];
    }
}
