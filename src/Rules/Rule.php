<?php

namespace HttpOz\Locked\Rules;

abstract class Rule 
{
    abstract public function passes() : bool;
}