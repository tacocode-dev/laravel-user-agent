<?php

namespace TacoCode\LaravelUserAgent;

use BadMethodCallException;
use Detection\MobileDetect;

class Agent extends MobileDetect
{
    /**
     * @inheritdoc
     */
    public function __call($name, $arguments)
    {
        // make sure the name starts with 'is', otherwise
        if (!str_starts_with($name, 'is')) {
            throw new BadMethodCallException("No such method exists: $name");
        }

        $ruleName = substr($name, 2);

        return $this->is($ruleName);
    }
}
