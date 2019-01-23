<?php

namespace PHPUnitBasic\Tests\Modules\People\Generics\Entities\People;

use PHPUnit\Framework\TestCase;
use PHPUnitBasic\Modules\People\Generics\Entities\People\Address;

class AddressTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $address = new Address('', '', '', '');

        $this->assertInstanceOf(Address::class, $address);
    }

    public function testParams(): void
    {
        $address = new Address('city', 'state', 'street', 'number');

        $this->assertTrue(!empty($address->getCity()));
        $this->assertTrue(!empty($address->getState()));
        $this->assertTrue(!empty($address->getStreet()));
        $this->assertTrue(!empty($address->getNumber()));
    }

    public function testParamsEquals(): void
    {
        $address = new Address('city', 'state', 'street', 'number');

        $this->assertEquals('city', $address->getCity());
        $this->assertEquals('state', $address->getState());
        $this->assertEquals('street', $address->getStreet());
        $this->assertEquals('number', $address->getNumber());
    }

    /**
     * @dataProvider paramsProvider
     */
    public function testInvalidParams($city, $state, $street, $number): void
    {
        $this->expectException(\TypeError::class);

        new Address($city, $state, $street, $number);
    }

    public function paramsProvider(): array
    {
        return [
            'city params' => [
                [], 'state', 'street', 'number'
            ],
            'state params' => [
                'city', [], 'street', 'number'
            ],
            'street params' => [
                'city', 'state', [], 'number'
            ],
            'number params' => [
                'city', 'state', 'street', []
            ]
        ];
    }
}
