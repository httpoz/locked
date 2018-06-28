<?php

namespace HttpOz\Locked\Rules;

use Illuminate\Http\Request;

abstract class Rule
{
    abstract public function passes(Request $request) : bool;
}
