<?php

namespace spec\Ugly\DCI\Context;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ugly\DCI\Entity\User;
use Ugly\DCI\Factory\ContextFactory;

class NotLoggedInSpec extends ObjectBehavior
{

    public function let()
    {
        $user = new User();
        $factory = new ContextFactory('Not Logged In', $user);
        $this->beConstructedWith($user, $factory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ugly\DCI\Context\NotLoggedIn');
    }

    function it_should_be_able_to_be_logged_in()
    {
        $this->logIn()->shouldBeAnInstanceOf('Ugly\DCI\Context\LoggedIn');
        $this->hasRole('Logged In')->shouldBe(true);
    }
}
