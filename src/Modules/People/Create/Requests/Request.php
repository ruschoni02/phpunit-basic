<?php

namespace PHPUnitBasic\Modules\People\Create\Requests;

class Request
{
    private $age;
    private $name;
    private $city;
    private $state;
    private $birth;
    private $height;
    private $street;
    private $number;

    public function __construct(
        int $age,
        string $name,
        string $birth,
        float $height,
        string $city,
        string $state,
        string $street,
        string $number
    ) {
        $this->age = $age;
        $this->name = $name;
        $this->birth = $birth;
        $this->height = $height;
        $this->city = $city;
        $this->state = $state;
        $this->street = $street;
        $this->number = $number;
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
        return new \DateTime($this->birth);
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
