<?php

namespace App\Entity;

/**
 * Class PlayerHand
 * @package App\Entity
 */
class PlayerHand
{
    private array $cards = [];

    private array $sortedCards = [];

    /**
     * @param array $colorsOrder
     * @param array $valuesOrder
     */
    public function sort(array $colorsOrder, array $valuesOrder): void
    {
        $this->sortedCards = $this->cards;

        // Sort by color
        usort($this->sortedCards, function (Card $a, Card $b) use ($colorsOrder) {
            $pos_a = array_search($a->getColor()->getLabel(), array_column($colorsOrder, 'label'));
            $pos_b = array_search($b->getColor()->getLabel(), array_column($colorsOrder, 'label'));
            return $pos_a - $pos_b;
        });

        // Sort By value
        usort($this->sortedCards, function (Card $a, Card $b) use ($valuesOrder) {
            $pos_a = array_search($a->getValue(), $valuesOrder);
            $pos_b = array_search($b->getValue(), $valuesOrder);
            return $pos_a - $pos_b;
        });
    }

    /**
     * @param Card $card
     */
    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @return array
     */
    public function getSortedCards(): array
    {
        return $this->sortedCards;
    }

    /**
     * @param array $sortedCards
     */
    public function setSortedCards(array $sortedCards): void
    {
        $this->sortedCards = $sortedCards;
    }
}
