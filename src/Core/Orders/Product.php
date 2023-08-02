<?php

namespace Core\Orders;

class Product
{

    public function __construct(
        protected string $id,
        protected string $name,
        protected float $costPrice,
        protected float $totalPrice
    )
    {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCostPrice(): float
    {
        return $this->costPrice;
    }

    public function setCostPrice(float $costPrice): void
    {
        $this->costPrice = $costPrice;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    public function total(): float
    {
        return $this->getCostPrice() + $this->getTotalPrice();
    }

    public function totalWithTax(float $percentage): float
    {
        $sum = $this->total();
        return ($sum * $percentage) + $sum;
    }

}