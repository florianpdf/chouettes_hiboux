<?php

namespace ChouettesBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


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
