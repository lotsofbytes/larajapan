<?php

namespace Tests\Unit\Validations\Email;

use Tests\TestCase;
use Validator;

class EmailTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_email
     */
    public function email($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'required|email']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_email()
    {
        return [
            [['field' => 'example.com'],         false],

            [['field' => 'test@example.com'],    true],
            [['field' => 't.est@example.com'],   true],
            [['field' => 't..est@example.com'],  false],
            [['field' => 'test.@example.com'],   false],

            [['field' => 'test@docomo.ne.jp'],   true],
            [['field' => 't.est@docomo.ne.jp'],  true],
            [['field' => 't..est@docomo.ne.jp'], false], // 不正ではない
            [['field' => 'test.@docomo.ne.jp'],  false], // 不正ではない

            [['field' => 'test@dezweb.ne.jp'],   true],
            [['field' => 't.est@ezweb.ne.jp'],   true],
            [['field' => 't..est@ezweb.ne.jp'],  false], // 不正ではない
            [['field' => 'test.@ezweb.ne.jp'],   false], // 不正ではない
        ];
    }
}
