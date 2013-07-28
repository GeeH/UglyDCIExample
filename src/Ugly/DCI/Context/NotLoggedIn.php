<?php

namespace Ugly\DCI\Context;

class NotLoggedIn extends ContextAbstract
{


    public function logIn()
    {
        $this->entity->setState('Logged In');
        $this->setRole('Logged In');
        $this->contextFactory->setContext('Logged In');
        return $this->contextFactory->getContextProxy();
    }
}