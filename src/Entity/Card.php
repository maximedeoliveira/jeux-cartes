<?php

namespace App\Entity;

/**
 * Class Card
 * @package App\Entity
 */
class Card
{
    private CardColor $color;

    private CardValue $value;

    /**
     * @return CardColor
     */
    public function getColor(): CardColor
    {
        return $this->color;
    }

    /**
     * @param CardColor $color
     * @return $this
     */
    public function setColor(CardColor $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return CardValue
     */
    public function getValue(): CardValue
    {
        return $this->value;
    }

    /**
     * @param CardValue $value
     * @return $this
     */
    public function setValue(CardValue $value): self
    {
        $this->value = $value;

        return $this;
    }
}
