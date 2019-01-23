<?php

namespace PHPUnitBasic\Tests\Repositories;

use PHPUnit\Framework\TestCase;
use PHPUnitBasic\Repositories\PeopleRepository;
use PHPUnitBasic\Modules\People\Generics\Entities\People;
use PHPUnitBasic\Modules\People\Generics\Entities\People\Address;

class PeopleRepositoryTest extends TestCase
{
    public function testCreate(): void
    {
        $address = $this->createMock(Address::class);
        $birth = new \DateTime();

        $peopleRepository = new PeopleRepository();
        $people = $peopleRepository->create(22, 'Vitor Ruschoni', $birth, 1.0, $address);

        $this->assertInstanceOf(People::class, $people);
        $this->assertEquals(22, $people->getAge());
        $this->assertEquals('Vitor Ruschoni', $people->getName());
        $this->assertSame($birth, $people->getBirth());
        $this->assertEquals(1.0, $people->getHeight());
        $this->assertSame($address, $people->getAddress());
    }
}
