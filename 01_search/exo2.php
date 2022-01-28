<?php

namespace Exercice;

require_once __DIR__ . '/exo1.php';
use Exercice\Exo1;

class Search
{
    private Exo1 $exo1;

    public function __construct(
        public string $seq,
        public array $pos = []
    ) {
        $this->exo1 = new Exo1;
    }

    /**
     * Exercice 2
     */
    public function search_pos_seq_all(string $text)
    {
        $array = explode(' ', strtolower($text));

        foreach ($array as $key => $item) {
            $response = $this->exo1->search_pos_word(str_split($item), str_split(strtolower($this->seq)));
            
            if (!is_null($response)) {
                $this->pos[] = [
                    'word-placement' => $key,
                    'word' => $item, 
                    'seq-emplacement' => $response
                ];
            }
        }

        return $this;
    }
}

/**
 * To execute exo2
 * 
 * $search = new Search('Bonjour');
 * $response = $search->search_pos_seq_all('bonjour Bonjour hello. bonjour comment ca va bonjour');
 * print_r($response);
 */

$search = new Search('Bonjour');
$response = $search->search_pos_seq_all('bonjour Bonjour hello. bonjour comment ca va bonjour');

print_r($response);