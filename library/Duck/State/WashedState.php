<?php

namespace Duck\State;

use Duck\Duck;

class WashedState extends AbstractState
{
    public function beSucked(Duck $duck)
    {
        $timeout = rand(200000, 500000);
        usleep($timeout);

        if (rand(1, 100) > 90) {
            throw new \DomainException("Duck refused to be washed!!!");
        }

        $property = ReflectionHelper::getReflectionProperty();
        $property->setValue($duck, StateHelper::getState('Duck\State\SuckedState'));
    }


}
