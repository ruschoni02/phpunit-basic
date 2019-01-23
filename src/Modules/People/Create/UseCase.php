<?php

namespace PHPUnitBasic\Modules\People\Create;

use PHPUnitBasic\Dependencies\LogInterface;
use PHPUnitBasic\Repositories\PeopleRepository;
use PHPUnitBasic\Repositories\People\AddressRepository;
use PHPUnitBasic\Modules\People\Create\Requests\Request;
use PHPUnitBasic\Modules\People\Generics\Entities\People;
use PHPUnitBasic\Modules\People\Create\Exceptions\ErrorException;

class UseCase
{
    private $logger;
    private $peopleRepository;
    private $addressRepository;

    public function __construct(
        LogInterface $logger,
        PeopleRepository $peopleRepository,
        AddressRepository $addressRepository
    ) {
        $this->logger = $logger;
        $this->peopleRepository = $peopleRepository;
        $this->addressRepository = $addressRepository;
    }

    public function execute(Request $request): People
    {
        try {
            $this->logger->info('Init Create');

            $address = $this->addressRepository->create(
                $request->getCity(),
                $request->getState(),
                $request->getStreet(),
                $request->getNumber()
            );

            $people = $this->peopleRepository->create(
                $request->getAge(),
                $request->getName(),
                $request->getBirth(),
                $request->getHeight(),
                $address
            );

            $this->logger->info('Finish Create');

            return $people;
        } catch (\Throwable $exception) {
            $this->logger->error('Error Create');
            throw new ErrorException();
        }
    }
}
