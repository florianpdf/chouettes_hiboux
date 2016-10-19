<?php

namespace ChouettesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modele
 */
class Modele
{


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var string
     */
    private $lien;

    /**
     * @var boolean
     */
    private $add_block;

    /**
     * @var \ChouettesBundle\Entity\Categorie
     */
    private $categorie;

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
     * Set titre
     *
     * @param string $titre
     *
     * @return Modele
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Modele
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return Modele
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set addBlock
     *
     * @param boolean $addBlock
     *
     * @return Modele
     */
    public function setAddBlock($addBlock)
    {
        $this->add_block = $addBlock;

        return $this;
    }

    /**
     * Get addBlock
     *
     * @return boolean
     */
    public function getAddBlock()
    {
        return $this->add_block;
    }

    /**
     * Set categorie
     *
     * @param \ChouettesBundle\Entity\Categorie $categorie
     *
     * @return Modele
     */
    public function setCategorie(\ChouettesBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \ChouettesBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set image
     *
     * @param \ChouettesBundle\Entity\Image $image
     *
     * @return Modele
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
