<?php

namespace Adneom\Bundle\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Adneom\Bundle\DashboardBundle\Repository\BusinessEventRepository")
 * @ORM\Table(name="event")
 */
class DashboardEvent
{
    /**
     * @ORM\Column(type="integer", name="event_id")
     * @ORM\Id
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime", name="event_timestamp")
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="DashboardEventType")
     * @ORM\JoinColumn(name="event_type", referencedColumnName="type_id")
     */
    protected $type;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="event_user", referencedColumnName="user_id")
     */
    protected $user;

    /**
     * As of now useless
     * @ORM\Column(type="string", name="event_client", length=45)
     */
    protected $client;

    /**
     * Set id
     *
     * @param integer $id
     * @return DashboardEvent
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
     * Set date
     *
     * @param \DateTime $date
     * @return DashboardEvent
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set client
     *
     * @param string $client
     * @return DashboardEvent
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set type
     *
     * @param \Adneom\Bundle\DashboardBundle\Entity\DashboardEventType $type
     * @return DashboardEvent
     */
    public function setType(\Adneom\Bundle\DashboardBundle\Entity\DashboardEventType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Adneom\Bundle\DashboardBundle\Entity\DashboardEventType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param \Adneom\Bundle\DashboardBundle\Entity\User $user
     * @return DashboardEvent
     */
    public function setUser(\Adneom\Bundle\DashboardBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Adneom\Bundle\DashboardBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __toString()
    {
        return $this->getClient();
    }
}
