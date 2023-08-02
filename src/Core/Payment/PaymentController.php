<?php

namespace Core\Payment;

class PaymentController
{
    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository) {
        $this->paymentRepository = $paymentRepository;
    }

    public function execute()
    {
        return $this->paymentRepository->makePayment([]);
    }
}