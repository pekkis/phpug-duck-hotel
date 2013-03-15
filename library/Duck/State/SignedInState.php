<?php

namespace Duck\State;

use Duck\Duck;

class SignedInState extends AbstractState
{
    public function beWashed(Duck $duck)
    {
        $timeout = rand(100000, 300000);
        usleep($timeout);

        $property = ReflectionHelper::getReflectionProperty();
        $property->setValue($duck, StateHelper::getState('Duck\State\WashedState'));
    }


}
