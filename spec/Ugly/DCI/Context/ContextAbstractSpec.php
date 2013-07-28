<?php

namespace spec\Ugly\DCI\Context;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ugly\DCI\Entity\User;
use Ugly\DCI\Factory\ContextFactory;

class ContextAbstractSpec extends ObjectBehavior
{

    function let(User $user, ContextFactory $factory)
    {
        $this->beConstructedWith($user, $factory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ugly\DCI\Context\ContextAbstract');
    }

    function it_should_store_a_role()
    {
        $role = 'Not logged in';
        $this->setRole($role);
        $this->hasRole($role)->shouldBe(true);
        $this->getRole()->shouldBe($role);
    }

    function it_should_store_an_entity(User $entity)
    {
        $this->setEntity($entity);
        $this->hasEntity()->shouldBe(true);
        $this->getEntity()->shouldBe($entity);
    }
}
