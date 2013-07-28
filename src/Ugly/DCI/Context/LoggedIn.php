<?php

namespace Ugly\DCI\Context;

class LoggedIn extends ContextAbstract
{

    public function logOut()
    {
        $this->contextFactory->setContext('Not Logged In');
        $this->entity->setState('Not Logged In');
        $this->setRole('Not Logged In');
        return $this->contextFactory->getContextProxy();
    }
}