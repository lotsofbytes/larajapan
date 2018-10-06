<?php

namespace Tests\Unit\Validations\ActiveUrl;

use Tests\TestCase;
use Validator;

class ActiveUrlTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider_active_url
     */
    public function active_url($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|string|active_url']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_active_url()
    {
        return [
            [['field' => 'https://larajapan.com'],         true],
            [['field' => 'https://www.larajapan.com'],     true],
            [['field' => 'https://larajapan.com?foo=bar'], true],

            [['field' => 'larajapan.com'],                 false], // httpsがない
            [['field' => 'https://fake.larajapan.com'],    false] // 存在しないドメイン名。プロバイダーによってはtrueとなる場合あり
        ];
    }
}
