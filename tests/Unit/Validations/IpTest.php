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
            ['field' => 'required|ip']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_ip()
    {
        return [
            [['field' => '192'],   false],

            [['field' => '192.168.0.1'],                 true], // ip4
            [['field' => '2001:db8:0:1234:0:567:8:1'],   true], // ip6
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
            ['field' => 'required|ipv4']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_ipv4()
    {
        return [
            [['field' => '192'],   false],

            [['field' => '192.168.0.1'],                 true],  // ip4
            [['field' => '2001:db8:0:1234:0:567:8:1'],   false], // ip6
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
            ['field' => 'required|ipv6']
        );

        $this->assertEquals($expected, $v->passes());
    }

    public function provider_ipv6()
    {
        return [
            [['field' => '192'],   false],

            [['field' => '192.168.0.1'],                false], // ip4
            [['field' => '2001:db8:0:1234:0:567:8:1'],   true], // ip6
        ];
    }

}
