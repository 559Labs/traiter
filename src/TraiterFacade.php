<?php

namespace FFNLabs\Traiter;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FFNLabs\Traiter\Skeleton\SkeletonClass
 */
class TraiterFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'traiter';
    }
}
