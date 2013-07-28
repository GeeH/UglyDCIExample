<?php

namespace spec\Ugly\DCI\Factory;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ugly\DCI\Entity\User;

class ContextFactorySpec extends ObjectBehavior
{

    function let(User $entity)
    {
        $this->beConstructedWith('Not Logged In', $entity);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ugly\DCI\Factory\ContextFactory');
    }

    function it_can_create_a_proxy_wrapper_from_a_context()
    {
        $this->setContext('Not Logged In');
        $this->getContextProxy()->shouldBeAnInstanceOf('Ugly\DCI\Context\NotLoggedIn');
    }

    function it_can_convert_context_name_to_class_name()
    {
        $this->getClassNameFromContext('not Logged In')->shouldBe('Ugly\DCI\Context\NotLoggedIn');
    }

    function it_will_throw_exception_if_you_pass_a_bum_context()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringGetClassNameFromContext('shit context');
    }

}
