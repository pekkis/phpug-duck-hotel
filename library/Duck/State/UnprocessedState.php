<?php

namespace Duck\State;

use Duck\Duck;
use Duck\State\SignedInState;

class UnprocessedState extends AbstractState
{
    public function signIn(Duck $duck)
    {
        $timeout = rand(10000, 100000);
        usleep($timeout);

        $property = ReflectionHelper::getReflectionProperty();
        $property->setValue($duck, StateHelper::getState('Duck\State\SignedInState'));
    }


}
