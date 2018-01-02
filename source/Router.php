<?php declare(strict_types = 1);

namespace Apishka\Singleton;

use Apishka\EasyExtend\Router\ByKeyAbstract;

/**
 * Router
 *
 * @easy-extend-base
 */
class Router extends ByKeyAbstract
{
    /**
     * Checks item for correct information
     *
     * @param \ReflectionClass $reflector
     *
     * @return bool
     */
    protected function isCorrectItem(\ReflectionClass $reflector): bool
    {
        return $this->hasClassTrait($reflector, SingletonTrait::class);
    }

    /**
     * Get class variants
     *
     * @param \ReflectionClass $reflector
     * @param object           $item
     *
     * @return array
     */
    protected function getClassVariants(\ReflectionClass $reflector, $item): array
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
