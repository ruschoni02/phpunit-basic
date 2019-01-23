<?php

namespace PHPUnitBasic\Tests\Modules\People\Create;

use PHPUnit\Framework\TestCase;
use PHPUnitBasic\Dependencies\LogInterface;
use PHPUnitBasic\Modules\People\Create\UseCase;
use PHPUnitBasic\Repositories\PeopleRepository;
use PHPUnitBasic\Repositories\People\AddressRepository;
use PHPUnitBasic\Modules\People\Create\Requests\Request;
use PHPUnitBasic\Modules\People\Generics\Entities\People;
use PHPUnitBasic\Modules\People\Create\Exceptions\ErrorException;

class UseCaseTest extends TestCase
{
    public function testSuccess(): void
    {
        $logMock = $this->createMock(LogInterface::class);
        $logMock->expects($this->exactly(2))->method('info');

        $requestMock = $this->createMock(Request::class);

        $peopleRepository = $this->createMock(PeopleRepository::class);
        $peopleRepository->expects($this->once())->method('create');

        $addressRepository = $this->createMock(AddressRepository::class);
        $addressRepository->expects($this->once())->method('create');

        $useCase = new UseCase($logMock, $peopleRepository, $addressRepository);

        $this->assertInstanceOf(UseCase::class, $useCase);
        $people = $useCase->execute($requestMock);

        $this->assertInstanceOf(People::class, $people);
    }

    public function testError(): void
    {
        $this->expectException(ErrorException::class);

        $logMock = $this->createMock(LogInterface::class);
        $logMock->expects($this->once())->method('info');
        $logMock->expects($this->once())->method('error');

        $requestMock = $this->createMock(Request::class);

        $peopleRepository = $this->createMock(PeopleRepository::class);
        $peopleRepository->expects($this->once())->method('create')->willThrowException(new \Exception());

        $addressRepository = $this->createMock(AddressRepository::class);
        $addressRepository->expects($this->once())->method('create');

        $useCase = new UseCase($logMock, $peopleRepository, $addressRepository);
        $useCase->execute($requestMock);
    }
}
