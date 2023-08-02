<?php

namespace Payment;

use Core\Payment\PaymentController;
use Core\Payment\PaymentRepositoryInterface;
use PHPUnit\Framework\TestCase;

class PaymentUnitTest extends TestCase
{
    public function testPayment()
    {
        $mockeryPayment = \Mockery::mock(\stdClass::class, PaymentRepositoryInterface::class);
        $payment = new PaymentController($mockeryPayment);
        $this->assertTrue(true);
    }

    public function testExecute()
    {
        $mockeryPayment = \Mockery::mock(\stdClass::class, PaymentRepositoryInterface::class);
        $mockeryPayment
            ->shouldReceive('makePayment')
            ->times(1)
            ->andReturn(true);
        $payment = new PaymentController($mockeryPayment);
        $respnse = $payment->execute();
        $this->assertTrue($respnse);
    }

    protected function tearDown(): void
    {
        \Mockery::close();

        parent::tearDown();
    }
}