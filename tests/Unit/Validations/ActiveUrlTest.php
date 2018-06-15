<?php

namespace Tests\Unit\Validations;

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
            ['url' => 'active_url']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_active_url()
    {
        return [
            [['url' => null],                        false],
            [['url' => ''],                          true],
            [['url' => ' '],                         true], // space

            [['url' => 'https://larajapan.com'],     true],
            [['url' => 'https://www.larajapan.com'], true],
            [['url' => 'larajapan.com'],             false],
            [['url' => 'https://larajpan.com'],      false] // 存在しないドメイン名。プロバイダーによってはtrueとなる場合あり
        ];
    }
}
