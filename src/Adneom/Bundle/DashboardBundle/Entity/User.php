<?php

namespace Adneom\Bundle\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Column(type="integer", name="user_id")
     * @ORM\Id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="user_name", length=25)
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", name="user_surname", length=25)
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", name="user_mail", length=60)
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\ManyToOne(targetEntity="BusinessUnit")
     * @ORM\JoinColumn(name="user_bu", referencedColumnName="bu_id")
     */
    protected $business_unit;

    /**
     * @ORM\ManyToOne(targetEntity="UserLevel")
     * @ORM\JoinColumn(name="user_level", referencedColumnName="userlevel_id")
     */
    protected $level;

    /**
     * @ORM\Column(type="boolean", name="IsBuManager")
     */
    protected $isManager;

    /**
     * Set id
     *
     * @param integer $id
     * @return User
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
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isManager
     *
     * @param boolean $isManager
     * @return User
     */
    public function setIsManager($isManager)
    {
        $this->isManager = $isManager;

        return $this;
    }

    /**
     * Get isManager
     *
     * @return boolean 
     */
    public function getIsManager()
    {
        return $this->isManager;
    }

    /**
     * Set business_unit
     *
     * @param \Adneom\Bundle\DashboardBundle\Entity\BusinessUnit $businessUnit
     * @return User
     */
    public function setBusinessUnit(\Adneom\Bundle\DashboardBundle\Entity\BusinessUnit $businessUnit = null)
    {
        $this->business_unit = $businessUnit;

        return $this;
    }

    /**
     * Get business_unit
     *
     * @return \Adneom\Bundle\DashboardBundle\Entity\BusinessUnit 
     */
    public function getBusinessUnit()
    {
        return $this->business_unit;
    }

    /**
     * Set level
     *
     * @param \Adneom\Bundle\DashboardBundle\Entity\UserLevel $level
     * @return User
     */
    public function setLevel(\Adneom\Bundle\DashboardBundle\Entity\UserLevel $level = null)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return \Adneom\Bundle\DashboardBundle\Entity\UserLevel 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get name+first
     *
     * @return string
     */
    public function getName()
    {
        return $this->lastname.' '.$this->firstname;
    }
}
