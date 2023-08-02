<?php

namespace Orders;

use Core\Orders\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testAttributes()
    {
        $customer = new Customer(
            name: "Giovanni"
        );
        $this->assertEquals("Giovanni", $customer->getName());

        $customer->changeName(
            name: "New Name"
        );
        $this->assertEquals("New Name", $customer->getName());
    }
}