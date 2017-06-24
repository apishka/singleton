<?php

namespace Apishka\Singleton;

/**
 * Router
 *
 * @easy-extend-base
 */

class Router extends \Apishka\EasyExtend\Router\ByKeyAbstract
{
    /**
     * Checks item for correct information
     *
     * @param \ReflectionClass $reflector
     *
     * @return bool
     */

    protected function isCorrectItem(\ReflectionClass $reflector)
    {
        return $reflector->isSubclassOf('\Apishka\Singleton\SingletonTrait');
    }

    /**
     * Get class variants
     *
     * @param \ReflectionClass $reflector
     * @param object           $item
     *
     * @return array
     */

    protected function getClassVariants(\ReflectionClass $reflector, $item)
    {
        return $item->getSupportedNames();
    }

    /**
     * Get item
     *
     * @param string|array $name
     *
     * @return mixed
     */

    public function getItem($name)
    {
        if (func_num_args() > 1)
            $name = func_get_args();

        $info  = $this->getItemData($name);
        $class = $info['class'];

        return $class::apishkaCreateInstance();
    }
}
