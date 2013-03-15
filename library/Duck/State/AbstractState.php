<?php

namespace Duck\State;

use Duck\Duck;

Abstract class AbstractState implements State
{
    public function signIn(Duck $duck)
    {
        throw new \DomainException('Invalid operation (SIGN IN) for current state of duck -> ' . get_class($this));
    }

    public function beWashed(Duck $duck)
    {
        throw new \DomainException('Invalid operation (BE WASHED) for current state of duck -> ' . get_class($this));
    }

    public function beSucked(Duck $duck)
    {
        throw new \DomainException('Invalid operation (BE SUCKED) for current state of duck -> ' . get_class($this));
    }

    public function beSuckled(Duck $duck)
    {
        throw new \DomainException('Invalid operation (BE SUCKLED) for current state of duck -> ' . get_class($this));
    }

    public function goForASwim(Duck $duck)
    {
        throw new \DomainException('Invalid operation (GO FOR A SWIM) for current state of duck -> ' . get_class($this));
    }

    public function signOut(Duck $duck)
    {
        throw new \DomainException('Invalid operation (SIGN OUT) for current state of duck -> ' . get_class($this));
    }

}
