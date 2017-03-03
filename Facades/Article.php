<?php

namespace Labs\Articles\Facades;

class Article extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'article'; }
}