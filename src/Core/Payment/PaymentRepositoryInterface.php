<?php

namespace Core\Payment;

interface PaymentRepositoryInterface
{
    public function getAll(): array;
    public function createPlan(array $data): object;
    public function findClientById(int $id): ?object;

    public function makePayment(array $data): bool;
}