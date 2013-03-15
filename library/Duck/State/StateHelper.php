<?php

namespace Duck\State;


class StateHelper
{

    /**
     * @param string $class
     * @return State
     */
    public static function getState($class)
    {
        static $states = [];

        if (!isset($states[$class])) {
            $states[$class] = new $class();
        }
        return $states[$class];
    }


}
