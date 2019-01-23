<?php

namespace PHPUnitBasic\Tests\Modules\People\Generics\Entities;

use PHPUnit\Framework\TestCase;
use PHPUnitBasic\Modules\People\Generics\Entities\People;

class PeopleTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $addressMock = $this->createMock(People\Address::class);
        $people = new People(0, '', (new \DateTime()), 0.0, $addressMock);

        $this->assertInstanceOf(People::class, $people);
    }

    public function testEquals(): void
    {
        $addressMock = $this->createMock(People\Address::class);
        $now = new \DateTime();
        $people = new People(0, '', $now, 0.0, $addressMock);

        $this->assertEquals(0, $people->getAge());
        $this->assertEquals('', $people->getName());
        $this->assertEquals($now, $people->getBirth());
        $this->assertEquals(0.0, $people->getHeight());
        $this->assertEquals($addressMock, $people->getAddress());
    }

    /**
     * @dataProvider invalidParamsProvider
     */
    public function testInvalidParams($age, $name, $birth, $height, $adress): void
    {
        $this->expectException(\TypeError::class);

        new People($age, $name, $birth, $height, $adress);

    }

    public function invalidParamsProvider(): array
    {
        $now = new \DateTime;
        $addressMock = $this->createMock(People\Address::class);
        return [
            'age' => [
                [],
                '',
                $now,
                0.0,
                $addressMock,
            ],
            'name' => [
                0,
                [],
                $now,
                0.0,
                $addressMock,
            ],
        ];
    }
}
