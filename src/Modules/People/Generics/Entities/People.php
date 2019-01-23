<?php

namespace PHPUnitBasic\Entities;

namespace PHPUnitBasic\Modules\People\Generics\Entities;

use PHPUnitBasic\Modules\People\Generics\Entities\People\Address;

class People
{
    private $id;
    private $age;
    private $name;
    private $birth;
    private $height;
    private $address;

    public function __construct(int $age, string $name, \DateTime $birth, float $height, Address $address)
    {
        $this->age = $age;
        $this->name = $name;
        $this->birth = $birth;
        $this->height = $height;
        $this->id = rand(1, 1000);
        $this->address = $address;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirth(): \DateTime
    {
        return $this->birth;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }
}
