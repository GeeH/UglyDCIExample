<?php

namespace Ugly\DCI\Context;

use Ugly\DCI\Factory\ContextFactory;

/**
 * Class ContextAbstract
 * @package Ugly\DCI\Context
 */
class ContextAbstract
{
    /**
     * @var string
     */
    protected $role;
    /**
     * @var \SplObjectStorage
     */
    protected $entity;
    /**
     * @var ContextFactory
     */
    protected $contextFactory;

    /**
     * @param \SplObjectStorage $entity
     * @param ContextFactory $contextFactory
     */
    function __construct(\SplObjectStorage $entity, ContextFactory $contextFactory)
    {
        $this->setEntity($entity);
        $this->contextFactory = $contextFactory;
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * @return string|null
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return bool
     */
    public function hasEntity()
    {
        return $this->entity instanceof \SplObjectStorage;
    }

    /**
     * @return \SplObjectStorage
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param \SplObjectStorage $entity
     */
    public function setEntity(\SplObjectStorage $entity)
    {
        $this->entity = $entity;
    }
}