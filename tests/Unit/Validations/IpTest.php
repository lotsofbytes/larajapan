<?php

namespace Tests\Unit\Validations\Ip;

use Tests\TestCase;
use Validator;

class IpTest extends TestCase
{
    /**
     * @test
	 * @dataProvider provider_ip
     */
    public function ip($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'ip']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_ip()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '192'],   false],

            [['field' => '192.168.0.1'],   true],
            [['field' => '2001:db8:0:1234:0:567:8:1'],   true],
        ];
    }

    /**
     * @test
     * @dataProvider provider_ipv4
     */
    public function ipv4($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'ipv4']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_ipv4()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '192'],   false],

            [['field' => '192.168.0.1'],   true],
            [['field' => '2001:db8:0:1234:0:567:8:1'],   false],
        ];
    }

    /**
     * @test
     * @dataProvider provider_ipv6
     */
    public function ipv6($input, $expected)
    {
        $v = Validator::make(
            $input,
            ['field' => 'ipv6']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_ipv6()
    {
        return [
            [['field' => null],    false],
            [['field' => ''],      true],
            [['field' => ' '],     true], // space

            [['field' => '192'],   false],

            [['field' => '192.168.0.1'],   false],
            [['field' => '2001:db8:0:1234:0:567:8:1'],   true],
        ];
    }

}
