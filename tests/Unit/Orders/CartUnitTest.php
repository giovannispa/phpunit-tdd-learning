<?php

namespace Orders;

use Core\Orders\Cart;
use Core\Orders\Product;
use PHPUnit\Framework\TestCase;

class CartUnitTest extends TestCase
{
    public function testCart()
    {
        $cart = new Cart();
        $this->assertTrue(true);
    }

    public function testAddProduct()
    {
        $cart = new Cart();
        $cart->add(product: new Product(
            id: '1',
            name: 'teste',
            costPrice: 20,
            totalPrice: 40
        ));
        $cart->add(product: new Product(
            id: '2',
            name: 'teste2',
            costPrice: 30,
            totalPrice: 50
        ));

        $this->assertTrue(true);
    }

    public function testItemsAttribute()
    {
        $cart = new Cart();
        $cart->add(product: new Product(
            id: '1',
            name: 'teste',
            costPrice: 20,
            totalPrice: 40
        ));
        $cart->add(product: new Product(
            id: '2',
            name: 'teste2',
            costPrice: 30,
            totalPrice: 50
        ));

        $this->assertCount(2, $cart->getItems());
    }

    public function testCartEmpty()
    {
        $cart = new Cart();

        $this->assertCount(0, $cart->getItems());
    }

    public function testQuantityProducts()
    {
        $cart = new Cart();
        $cart->add(product: new Product(
            id: '1',
            name: 'teste',
            costPrice: 20,
            totalPrice: 40
        ));
        $cart->add(product: new Product(
            id: '2',
            name: 'teste2',
            costPrice: 30,
            totalPrice: 50
        ));

        $this->assertEquals(1, $cart->getItems()[1]['qtd']);
        $this->assertEquals(1, $cart->getItems()[2]['qtd']);

        $cart->add(product: new Product(
            id: '2',
            name: 'teste2',
            costPrice: 30,
            totalPrice: 50
        ));

        $this->assertEquals(2, $cart->getItems()[2]['qtd']);
    }

    public function testTotalCart()
    {
        $cart = new Cart();
        $cart->add(product: new Product(
            id: '1',
            name: 'teste',
            costPrice: 20,
            totalPrice: 50
        ));
        $cart->add(product: new Product(
            id: '1',
            name: 'teste',
            costPrice: 20,
            totalPrice: 50
        ));
        $cart->add(product: new Product(
            id: '2',
            name: 'teste2',
            costPrice: 40,
            totalPrice: 70
        ));

        $this->assertEquals(80, $cart->total());
    }
}