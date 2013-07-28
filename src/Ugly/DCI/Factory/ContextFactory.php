<?php

namespace Ugly\DCI\Factory;

use Ugly\DCI\Context;

/**
 * Class ContextFactory
 * @package Ugly\DCI\Factory
 */
class ContextFactory
{
    /**
     * @var string
     */
    protected $context;
    /**
     * @var \SplObjectStorage
     */
    protected $entity;

    /**
     * @param $context
     * @param \SplObjectStorage $entity
     */
    public function __construct($context, \SplObjectStorage $entity)
    {
        $this->context = $this->setContext($context);
        $this->entity = $entity;
    }

    /**
     * Converts context name to context class name
     *
     * @param $context
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getClassNameFromContext($context)
    {
        $class = explode(' ', $context);
        $class = array_map('ucfirst', $class);
        $class = implode('', $class);
        $class = "Ugly\\DCI\\Context\\$class";
        if (!class_exists($class)) {
            throw new \InvalidArgumentException("Cannot find class by name `$class`");
        }
        return $class;
    }

    /**
     * @return mixed
     */
    public function getContextProxy()
    {
        $context = $this->getContext();
        $proxyWrapper = new $context($this->entity, $this);
        return $proxyWrapper;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $this->getClassNameFromContext($context);
    }
}