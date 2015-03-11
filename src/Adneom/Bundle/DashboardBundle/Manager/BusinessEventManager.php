<?php

namespace Adneom\Bundle\DashboardBundle\Manager;
use Doctrine\ORM\EntityManager;

class BusinessEventManager
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
    * Counting and reordering the data for ajax rendering.
    * @param string $daily (returned by the router)
    * @return array
    */
    public function countHits($daily)
    {
        $events = $this->em
            ->getRepository('DashboardBundle:DashboardEvent')
            ->countBusinessUnitHits($daily === 'daily');

        $repository = $this->em
            ->getRepository('DashboardBundle:BusinessUnit');

        $business_units = $repository->findAll();

        $repository = $this->em
            ->getRepository('DashboardBundle:DashboardEventType');

        $types = $repository->findAll();

        $data=[];
        $data[0]=[null];
        foreach ($business_units as $bu) {
            $data[0][]=$bu->getName();
            foreach ($types as $type) {
                $found = array_filter($events, function($v) use ($bu, $type) {
                    if($v['bu'] == $bu->getName() and $v['type'] == $type->getName() ){
                        return true;
                    }
                });
                if(!isset($data[$type->getId()])){
                    $data[$type->getId()]=[$type->getName()];
                }
                if(!empty($found)){
                    $found = reset($found);
                    $data[$type->getId()][]=$found['hits'];
                } else {
                    $data[$type->getId()][]=0;
                }
            } 
        }
        return $data;
    }

    /**
    * Counting and reordering the data for ajax rendering.
    * @param string $daily (returned by the router)
    * @return array
    */
    public function countCountryHits($daily)
    {
        $events = $this->em
            ->getRepository('DashboardBundle:DashboardEvent')
            ->countCountryHits($daily === 'daily');

        $repository = $this->em
            ->getRepository('DashboardBundle:Country');

        $countries = $repository->findAll();

        $repository = $this->em
            ->getRepository('DashboardBundle:DashboardEventType');

        $types = $repository->findAll();

        $data=[];
        $data[0]=[null];
        foreach ($countries as $country) {
            $data[0][]=$country->getName();
            foreach ($types as $type) {
                $found = array_filter($events, function($v) use ($country, $type) {
                    if($v['country'] == $country->getName() and $v['type'] == $type->getName() ){
                        return true;
                    }
                });
                if(!isset($data[$type->getId()])){
                    $data[$type->getId()]=[$type->getName()];
                }
                if(!empty($found)){
                    $found = reset($found);
                    $data[$type->getId()][]=$found['hits'];
                } else {
                    $data[$type->getId()][]=0;
                }
            } 
        }
        return $data;
    }    

    /**
    * Counting and reordering the data for ajax rendering.
    * @param string $daily (returned by the router)
    * @return array
    */
    public function countBusinessManagerHits($daily)
    {
        $events = $this->em
            ->getRepository('DashboardBundle:DashboardEvent')
            ->countBusinessManagerHits($daily === 'daily');

        $repository = $this->em
            ->getRepository('DashboardBundle:User');

        $businessManagers = $repository->findAll();

        $repository = $this->em
            ->getRepository('DashboardBundle:DashboardEventType');

        $types = $repository->findAll();

        $data=[];
        $data[0]=[null];
        foreach ($businessManagers as $businessManager) {
            $data[0][]=$businessManager->getName();
            foreach ($types as $type) {
                $found = array_filter($events, function($v) use ($businessManager, $type) {
                    if($v['businessManager'] == $businessManager->getName() and $v['type'] == $type->getName() ){
                        return true;
                    }
                });
                if(!isset($data[$type->getId()])){
                    $data[$type->getId()]=[$type->getName()];
                }
                if(!empty($found)){
                    $found = reset($found);
                    $data[$type->getId()][]=$found['hits'];
                } else {
                    $data[$type->getId()][]=0;
                }
            } 
        }
        return $data;
    }   
}