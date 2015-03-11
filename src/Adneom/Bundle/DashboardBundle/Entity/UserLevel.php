<?php

namespace Adneom\Bundle\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="userlevel")
 */
class UserLevel
{
    /**
     * @ORM\Column(type="integer", name="userlevel_id")
     * @ORM\Id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="userlevel_description")
     */
    protected $name;


    /**
     * Set id
     *
     * @param integer $id
     * @return UserLevel
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
     * @return UserLevel
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
}
