<?php

namespace Tests\Unit\Validations;

use Tests\TestCase;
use Validator;

class ActiveURLTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_validate
     */
    public function active_url($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['url' => 'active_url']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_validate()
    {
        return [
            [['url' => 'http://larajapan.com'], true],
            [['url' => 'larajapan.com'], false],
            [['url' => 'http://larajpan.com'], false],
        ];
    }
}
