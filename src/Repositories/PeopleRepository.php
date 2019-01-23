<?php

namespace PHPUnitBasic\Repositories;

use PHPUnitBasic\Modules\People\Generics\Entities\People;
use PHPUnitBasic\Modules\People\Generics\Entities\People\Address;

class PeopleRepository
{
    public function create(int $age, string $name, \DateTime $birth, float $height, ?Address $address): People
    {
        return new People($age, $name, $birth, $height, $address);
    }
}
