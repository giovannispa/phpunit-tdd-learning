<?php

namespace Core\Orders;

class Cart
{
    /**
     * @var Product[]
     */
    private array $items = [];

    public function add(Product $product): void
    {
        $qtd = $this->getQuantityProduct($product->getId());
        $this->items[$product->getId()] = [
            'qtd' => $qtd,
            'product' => $product
        ];
    }

    public function getQuantityProduct(int $id)
    {
        return isset($this->getItems()[$id]) ? $this->getItems()[$id]['qtd'] + 1 : 1;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function total(): float|int
    {
        $total = 0;

        foreach($this->getItems() as $item) {
            $total += $item['product']->getCostPrice() * $item['qtd'];
        }

        return $total;
    }
}