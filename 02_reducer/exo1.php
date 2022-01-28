<?php
namespace Exercice;

$sum = function($acc, $curr): int { return $acc + $curr; };

function my_reduce(array $numbers, $sum, int $initial = 0): int
{
    foreach ($numbers as $number) {
        $initial = $sum($number, $initial);
    }

    return $initial;
}

$numbers = [1,2,3,5];
print_r(my_reduce($numbers, $sum, $initial=0));
