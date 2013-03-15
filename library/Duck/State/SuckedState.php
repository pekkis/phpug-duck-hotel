<?php

namespace Duck\State;

use Duck\Duck;

class SuckedState extends AbstractState
{
    public function beSuckled(Duck $duck)
    {
        $timeout = rand(500000, 1000000);
        usleep($timeout);

        if (rand(1, 100) > 70) {
            throw new \DomainException("Suckling of the duck was not successful!!!");
        }

        $property = ReflectionHelper::getReflectionProperty();
        $property->setValue($duck, StateHelper::getState('Duck\State\SuckledState'));
    }


}
