<?php

namespace App\Entity;

/**
 * Class CardValue
 * @package App\Entity
 */
class CardValue
{
    private string $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
