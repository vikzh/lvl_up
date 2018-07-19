<?php

namespace App;

class Rational
{
    public $numer;
    public $denom;

    public function __construct($numer, $denom)
    {
        $this->numer = $numer;
        $this->denom = $denom;
    }

    public function getNumer()
    {
        return $this->numer;
    }

    public function getDenom()
    {
        return $this->denom;
    }

    public function add($rational)
    {
        $numer = $rational->getNumer() * $this->getDenom() + $this->getNumer() * $rational->getDenom();
        $denom = $rational->getDenom() * $this->getDenom();
        return new Rational($numer, $denom);
    }

    public function sub($rational)
    {
        $numer = $this->getNumer() * $rational->getDenom() - $rational->getNumer() * $this->getDenom();
        $denom = $rational->getDenom() * $this->getDenom();
        return new Rational($numer, $denom);
    }
}