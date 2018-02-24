<?php

namespace Apishka\Singleton;

/**
 * Singleton trait
 */
trait SingletonTrait
{
    /**
     * Get supported names
     *
     * @return array
     */
    abstract public function getSupportedNames();

    /**
     * Apishka create instance
     *
     * @return mixed
     */
    public static function apishkaCreateInstance()
    {
        return new static();
    }
}
