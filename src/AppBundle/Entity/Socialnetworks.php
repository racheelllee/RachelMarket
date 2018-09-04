<?php

namespace AppBundle\Entity;

/**
 * Socialnetworks
 */
class Socialnetworks
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $link;

    /**
     * @var \AppBundle\Entity\Informations
     */
    private $informations;


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
     * Set name
     *
     * @param string $name
     *
     * @return Socialnetworks
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Socialnetworks
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set informations
     *
     * @param \AppBundle\Entity\Informations $informations
     *
     * @return Socialnetworks
     */
    public function setInformations(\AppBundle\Entity\Informations $informations = null)
    {
        $this->informations = $informations;

        return $this;
    }

    /**
     * Get informations
     *
     * @return \AppBundle\Entity\Informations
     */
    public function getInformations()
    {
        return $this->informations;
    }
}

