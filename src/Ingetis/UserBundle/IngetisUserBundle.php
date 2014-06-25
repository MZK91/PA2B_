<?php

namespace Ingetis\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IngetisUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
