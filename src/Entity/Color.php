<?php

namespace App\Entity;

/**
 * Class Color
 * @package App\Entity
 */
class Color
{
    private static array $values = [
        1 => [
            'label' => 'Carreaux',
            'symbol' => '♦',
            'color' => 'red'
        ],
        2 => [
            'label' => 'Coeur',
            'symbol' => '♥',
            'color' => 'red'
        ],
        3 => [
            'label' => 'Pic',
            'symbol' => '♠',
            'color' => 'black'
        ],
        4 => [
            'label' => 'Trèfle',
            'symbol' => '♣',
            'color' => 'black'
        ]
    ];

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return self::$values;
    }
}
