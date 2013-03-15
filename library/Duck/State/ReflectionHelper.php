<?php

namespace Duck\State;

use ReflectionProperty;

class ReflectionHelper
{

    /**
     * @return \ReflectionProperty
     */
    public static function getReflectionProperty()
    {
        static $property;

        if (!$property) {
            $property = new ReflectionProperty('Duck\Duck', 'state');
            $property->setAccessible(true);
        }

        return $property;
    }

}
