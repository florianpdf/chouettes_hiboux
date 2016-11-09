<?php

namespace ChouettesBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;


class User extends BaseUser
{
/**
 * @var integer
 */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

}
