<?php

namespace Orders;

use Core\Orders\Product;
use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    public function testProduct()
    {
        $product = new Product(
            id: '1',
            name: 'Calça',
            costPrice: 20,
            totalPrice: 40
        );

        $this->assertTrue(true);
    }

    public function testTotal()
    {
        $product = new Product(
            id: '1',
            name: 'Calça',
            costPrice: 20,
            totalPrice: 40
        );

        $this->assertEquals(60, $product->total());
    }

    public function testNameAttribute()
    {
        $product = new Product(
            id: '1',
            name: 'Calça',
            costPrice: 20,
            totalPrice: 40
        );

        $this->assertEquals('Calça', $product->getName());
        $product->setName('Short');
        $this->assertEquals('Short', $product->getName());
    }

    public function testCostPriceAttribute()
    {
        $product = new Product(
            id: '1',
            name: 'Calça',
            costPrice: 20,
            totalPrice: 40
        );

        $this->assertEquals(20, $product->getCostPrice());
        $product->setCostPrice(30);
        $this->assertEquals(30, $product->getCostPrice());
    }

    public function testTotaPriceAttribute()
    {
        $product = new Product(
            id: '1',
            name: 'Calça',
            costPrice: 20,
            totalPrice: 40
        );

        $this->assertEquals(40, $product->getTotalPrice());
        $product->setTotalPrice(60);
        $this->assertEquals(60, $product->getTotalPrice());
    }

    public function testTotalWithFixedTax()
    {
        $product = new Product(
            id: '1',
            name: 'Calça',
            costPrice: 20,
            totalPrice: 40
        );

        $this->assertEquals(66, $product->totalWithTax(0.1));
    }

    public function testTotalWithVariableTax()
    {
        $product = new Product(
            id: '1',
            name: 'Calça',
            costPrice: 20,
            totalPrice: 40
        );

        $this->assertEquals(66, $product->totalWithTax(0.1));
        $this->assertEquals(72, $product->totalWithTax(0.2));
        $this->assertEquals(78, $product->totalWithTax(0.3));
        $this->assertEquals(84, $product->totalWithTax(0.4));
        $this->assertEquals(90, $product->totalWithTax(0.5));
    }
}