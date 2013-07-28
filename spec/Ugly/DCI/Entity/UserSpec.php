<?php

namespace spec\Ugly\DCI\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ugly\DCI\Entity\User');
    }
}
