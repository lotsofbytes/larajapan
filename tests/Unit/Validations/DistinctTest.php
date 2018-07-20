<?php

namespace Tests\Unit\Validations\Distinct;

use Tests\TestCase;
use Validator;

class DistinctTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_distinct
     */
    public function distinct($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field.*' => 'distinct'] // fieldではエラー。*が必要。
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_distinct()
    {
        return [
            [['field' => null],    true],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => ['犬', '猫']],       true],
            [['field' => ['犬', '猫', '犬']], false]
        ];
    }
}
