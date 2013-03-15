<?php

namespace Duck\State;

use Duck\Duck;

class WashedState extends AbstractState
{
    public function beSucked(Duck $duck)
    {
        $timeout = rand(10000, 100000);
        usleep($timeout);

        $property = ReflectionHelper::getReflectionProperty();
        $property->setValue($duck, StateHelper::getState('Duck\State\SuckedState'));
    }


}
