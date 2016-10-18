<?php

namespace ChouettesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Whoami
 */
class Whoami
{
  
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \ChouettesBundle\Entity\Image
     */
    private $image;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Whoami
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set image
     *
     * @param \ChouettesBundle\Entity\Image $image
     * @return Whoami
     */
    public function setImage(\ChouettesBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \ChouettesBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }
}
