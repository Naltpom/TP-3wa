<?php
namespace Exercice;

$callback = function($price, $quantity): float { return $price * $quantity; };

class Product 
{
    public function __construct(public string $name, public float $price, public float $quantity) {}
}

$hydrate = function(array $products) {
    return new class ($products) {
        public array $products;

        public function __construct (
            public array $carts
        ) {
            foreach ($carts as $product) {
                $this->products[] = new Product($product[0], $product[1], $product[2]);
            }
        }
    };
};

function my_reduce(object $hydrate, object $callback, int $initial = 0)
{
    foreach ($hydrate->products as $product) {
        $initial += $callback($product->price, $product->quantity);
    }

    return $initial;
}

$products = [['milk', 3, 3], ['butter', 2.5, 2],['eggs', .7, 10]];
echo my_reduce($hydrate($products), $callback, 0); // 21
