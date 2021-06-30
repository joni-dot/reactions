<?php

namespace JoniDot\Reactions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JoniDot\Reactions\Reactions
 */
class ReactionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'reactions';
    }
}
