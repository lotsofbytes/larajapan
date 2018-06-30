<?php

namespace Tests\Unit\Validations\Url;

use Tests\TestCase;
use Validator;

class UrlTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_url
     */
    public function url($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'url']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_url()
    {
        return [
            [['field' => null],                        false],
            [['field' => ''],                          true],
            [['field' => ' '],                         true], // space

            [['field' => 'https://larajapan.com'],         true],
            [['field' => 'https://www.larajapan.com'],     true],
            [['field' => 'larajapan.com'],                 false],
            [['field' => 'https://larajapan.com?foo=bar'], true],
            [['field' => 'https://fake.larajapan.com'],    true],
        ];
    }
}
