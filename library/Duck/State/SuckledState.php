<?php

namespace Duck\State;

use Duck\Duck;

class SuckledState extends AbstractState
{
    public function goForASwim(Duck $duck)
    {
        $timeout = rand(10000, 100000);
        usleep($timeout);

        $property = ReflectionHelper::getReflectionProperty();
        $property->setValue($duck, StateHelper::getState('Duck\State\SatisfiedState'));
    }


}
