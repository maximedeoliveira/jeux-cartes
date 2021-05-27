<?php

namespace App\Entity;

/**
 * Class Deck
 * @package App\Entity
 */
class Deck
{
    private array $cards = [];

    private array $colorsOrder = [];

    private array $valuesOrder = [];

    public function __construct()
    {
        // Création du jeu
        foreach(Color::getValues() as $color){
            $cardColor = new CardColor();
            $cardColor->setColor($color['color']);
            $cardColor->setSymbol($color['symbol']);
            $cardColor->setLabel($color['label']);

            foreach(Value::getValues() as $value){
                $cardValue = new CardValue();
                $cardValue->setValue($value);

                $card = new Card();
                $card->setValue($cardValue);
                $card->setColor($cardColor);

                $this->cards[] = $card;
            }
        }

        $this->createColorRule();
        $this->createValueRule();
    }

    /**
     * Create a random player hand
     * @param int $numberCards
     * @return PlayerHand
     */
    public function createPlayerHand(int $numberCards): PlayerHand
    {
        $playerHand = new PlayerHand();

        while (count($playerHand->getCards()) < $numberCards) {
            $random_pos = array_rand($this->cards, 1);

            $playerHand->addCard($this->cards[$random_pos]);
            unset($this->cards[$random_pos]);
        }

        $playerHand->sort($this->colorsOrder, $this->valuesOrder);

        return $playerHand;
    }

    /**
     * Create a random color list
     */
    private function createColorRule(): void
    {
        foreach(Color::getValues() as $color){
            $cardColor = new CardColor();
            $cardColor->setColor($color['color']);
            $cardColor->setSymbol($color['symbol']);
            $cardColor->setLabel($color['label']);

            $this->colorsOrder[] = $cardColor;
        }

        shuffle($this->colorsOrder);
    }

    /**
     * Create a random color list
     */
    private function createValueRule(): void
    {
        foreach(Value::getValues() as $value){
            $cardValue = new CardValue();
            $cardValue->setValue($value);

            $this->valuesOrder[] = $cardValue;
        }

        shuffle($this->valuesOrder);
    }

    /**
     * @return array
     */
    public function getColorsOrder(): array
    {
        return $this->colorsOrder;
    }

    /**
     * @return array
     */
    public function getValuesOrder(): array
    {
        return $this->valuesOrder;
    }
}
