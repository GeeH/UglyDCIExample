<?php

namespace spec\Ugly\DCI\Context;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ugly\DCI\Entity\User;
use Ugly\DCI\Factory\ContextFactory;

class LoggedInSpec extends ObjectBehavior
{

    public function let()
    {
        $user = new User();
        $factory = new ContextFactory('Logged In', $user);
        $this->beConstructedWith($user, $factory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ugly\DCI\Context\LoggedIn');
    }

    function it_should_be_able_to_be_logged_out()
    {
        $this->logOut()->shouldBeAnInstanceOf('Ugly\DCI\Context\NotLoggedIn');
        $this->hasRole('Not Logged In')->shouldBe(true);
    }
}
