<?php

namespace Apishka\Singleton;

/**
 * Storage
 */

class Storage
{
    /**
     * Traits
     */

    use \Apishka\EasyExtend\Helper\ByClassNameTrait;

    /**
     * Router
     *
     * @var Router
     */

    private $_router = null;

    /**
     * Singletons
     *
     * @var array
     */

    private $_singletons = array();

    /**
     * Get
     *
     * @param string $name
     *
     * @return mixed
     */

    public function __get($name)
    {
        if (!array_key_exists($name, $this->_singletons))
            $this->_singletons[$name] = $this->createSingleton($name);

        return $this->_singletons[$name];
    }

    /**
     * Create singleton
     *
     * @param string $name
     *
     * @return mixed
     */

    public function createSingleton($name)
    {
        return $this->getRouter()->getItem($name);
    }

    /**
     * Get router
     *
     * @return Router
     */

    protected function getRouter()
    {
        if ($this->_router === null)
            $this->_router = \Apishka\EasyExtend\Broker::getInstance()->getRouter('Apishka\Singleton\Router');

        return $this->_router;
    }
}
