<?php

namespace Adneom\Bundle\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="eventtype")
 */
class DashboardEventType
{
    /**
     * @ORM\Column(type="integer", name="type_id")
     * @ORM\Id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="type_name", length=45)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", name="eventtypePattern", length=45)
     */
    protected $pattern;

    /**
     * Set id
     *
     * @param integer $id
     * @return DashboardEventType
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
     * @return DashboardEventType
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
     * Set pattern
     *
     * @param string $pattern
     * @return DashboardEventType
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Get pattern
     *
     * @return string 
     */
    public function getPattern()
    {
        return $this->pattern;
    }
}
