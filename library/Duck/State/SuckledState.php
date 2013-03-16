<?php

namespace Duck\State;

use Duck\Duck;

class SuckledState extends AbstractState
{
    public function goForASwim(Duck $duck)
    {
        $timeout = rand(100000, 200000);
        usleep($timeout);

        $property = ReflectionHelper::getReflectionProperty();
        $property->setValue($duck, StateHelper::getState('Duck\State\SatisfiedState'));
    }


}
