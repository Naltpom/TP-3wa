<?php

namespace Exercice;

/**
 * Exercice 1
 */
class Exo1
{
    public function search_pos_word(array $content, array $seq): ?int
    {
        if (count($content) < count($seq)) return null;

        $count = 0;
        $pos = null;

        foreach ($content as $key => $value) {
            if ($value === $seq[$count]) {
                $count ++;
                $pos = $pos === null ? $key : $pos;
            } elseif ($count === count($seq)) {
                return $pos;
            } else {
                $pos = null;
                $count = 0;
            }
        }

        return $count === count($seq) ? $pos : null;
    }
}

/**
 * To execute exo1
 * 
 * $content = [2,1,4,2, 6, 1, 2, 3, 7];
 * $seq = [1,2,3];
 * $exo = new Exo1();
 * print_r($exo->search_pos_word(content : $content, seq : $seq));
 */
