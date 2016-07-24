<?php

namespace Hoppities\SermonAudio;

use Illuminate\Support\Facades\Facade;

class SermonAudioFacade extends Facade
{
    /**
     * The name of the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SermonAudio';
    }
}
