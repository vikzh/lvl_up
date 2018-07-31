<?php

class DeckOfCards
{
    private $cards;

    public function __construct(array $types)
    {
        $this->cards = collect($types)
            ->map(function ($card) {
                return array_fill(0, 4, $card);
            })
            ->flatten();
    }

    public function getShuffled(): array
    {
        return $this->cards->shuffle()->all();
    }
}