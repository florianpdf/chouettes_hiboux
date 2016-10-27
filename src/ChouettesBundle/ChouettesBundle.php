<?php

namespace ChouettesBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ChouettesBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
