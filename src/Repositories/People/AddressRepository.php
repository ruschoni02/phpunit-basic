<?php

namespace PHPUnitBasic\Repositories\People;

use PHPUnitBasic\Modules\People\Generics\Entities\People\Address;

class AddressRepository
{
    public function create(string $city, string $state, string $street, string $number): Address
    {
        return new Address($city, $state, $street, $number);
    }
}
