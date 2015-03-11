<?php

namespace Adneom\Bundle\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bu")
 */
class BusinessUnit
{
    /**
     * @ORM\Column(type="integer", name="bu_id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="bu_name")
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="bu_country", referencedColumnName="country_id")
     */
    protected $country;

    /**
     * Set id
     *
     * @param integer $id
     * @return BusinessUnit
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * @return BusinessUnit
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
     * Set country
     *
     * @param \Adneom\Bundle\DashboardBundle\Entity\Country $country
     * @return BusinessUnit
     */
    public function setCountry(\Adneom\Bundle\DashboardBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Adneom\Bundle\DashboardBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
