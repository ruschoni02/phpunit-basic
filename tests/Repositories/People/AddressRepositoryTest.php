<?php

namespace PHPUnitBasic\Tests\Repositories\People;

use PHPUnit\Framework\TestCase;
use PHPUnitBasic\Repositories\People\AddressRepository;
use PHPUnitBasic\Modules\People\Generics\Entities\People\Address;

class AddressRepositoryTest extends TestCase
{
    public function testCreate(): void
    {
        $addressRepository = new AddressRepository();
        $address = $addressRepository->create('city', 'state', 'street', 'number');

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals('city', $address->getCity());
        $this->assertEquals('state', $address->getState());
        $this->assertEquals('street', $address->getStreet());
        $this->assertEquals('number', $address->getNumber());
    }
}
