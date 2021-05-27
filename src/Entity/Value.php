<?php

namespace App\Entity;

/**
 * Class Value
 * @package App\Entity
 */
class Value
{
    private static array $values = ['AS', '10', '8', '6', '5', '7', '4', '2', '3', '9', 'Dame', 'Roi', 'Valet'];

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return self::$values;
    }
}
