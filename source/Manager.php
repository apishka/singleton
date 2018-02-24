<?php

namespace Apishka\Singleton;

/**
 * Manager
 */
class Manager
{
    /**
     * Instance variable
     *
     * @var Storage
     */
    private static $_instance = null;

    /**
     * Return instance of Jihad_Modules_CoreInstance_StorageAbstract
     *
     * @return Storage
     */
    public static function getInstance()
    {
        if (self::$_instance === null)
            self::$_instance = Storage::apishka();

        return self::$_instance;
    }

    /**
     * Construct
     */
    private function __construct()
    {}

    /**
     * Clone
     */
    private function __clone()
    {}

    /**
     * Wakeup
     */
    private function __wakeup()
    {}
}
