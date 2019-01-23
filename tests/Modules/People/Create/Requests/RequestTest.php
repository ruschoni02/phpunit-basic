<?php

namespace PHPUnitBasic\Tests\Modules\People\Create\Requests;

use PHPUnit\Framework\TestCase;
use PHPUnitBasic\Modules\People\Create\Requests\Request;

class RequestTest extends TestCase
{
    private $request;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        $this->request = new Request(
            22,
            'Vitor Ruschoni',
            '1996-02-01',
            1.0,
            'city',
            'state',
            'street',
            'number'
        );
        parent::__construct($name, $data, $dataName);
    }

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Request::class, $this->request);
    }

    public function testAttributes(): void
    {
        $this->assertEquals(22, $this->request->getAge());
        $this->assertEquals('Vitor Ruschoni', $this->request->getName());
        $this->assertEquals(new \DateTime('1996-02-01'), $this->request->getBirth());
        $this->assertEquals(1.0, $this->request->getHeight());
        $this->assertEquals('city', $this->request->getCity());
        $this->assertEquals('state', $this->request->getState());
        $this->assertEquals('street', $this->request->getStreet());
        $this->assertEquals('number', $this->request->getNumber());
    }
}
