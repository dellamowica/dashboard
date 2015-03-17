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
     * Reordering the data so that it can be used in Highcharts
     * @return array Columns for Highcharts
     */
    private function prepareColumns($items, $events, $types, $columnName)
    {
        $data=[0=>[null]];
        foreach ($items as $item) {
            $data[0][]=$item->getName();
            foreach ($types as $type) {
                $found = array_filter($events, function($v) use ($item, $type, $columnName) {
                    if($v[$columnName] == $item->getName() and $v['type'] == $type->getName() ){
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
    * @param string $weekly (returned by the router)
    * @return array
    */
    public function countHits($weekly = false)
    {
        $events = $this->em
            ->getRepository('DashboardBundle:DashboardEvent')
            ->countBusinessUnitHits($weekly === 'weekly');

        $business_units = $this->em
            ->getRepository('DashboardBundle:BusinessUnit')
            ->findAll();

        $types = $this->em
            ->getRepository('DashboardBundle:DashboardEventType')
            ->findAll();
        
        return $this->prepareColumns($business_units, $events, $types, 'bu');
    }

    /**
    * Counting and reordering the data for ajax rendering.
    * @param string $weekly (returned by the router)
    * @return array
    */
    public function countCountryHits($weekly)
    {
        $events = $this->em
            ->getRepository('DashboardBundle:DashboardEvent')
            ->countCountryHits($weekly === 'weekly');
        
        $countries = $this->em
            ->getRepository('DashboardBundle:Country')
            ->findAll();

        $types = $this->em
            ->getRepository('DashboardBundle:DashboardEventType')
            ->findAll();

        return $this->prepareColumns($countries, $events, $types, 'country');
    }    

    /**
    * Counting and reordering the data for ajax rendering.
    * @param string $weekly (returned by the router)
    * @return array
    */
    public function countBusinessManagerHits($weekly)
    {
        $events = $this->em
            ->getRepository('DashboardBundle:DashboardEvent')
            ->countBusinessManagerHits($weekly === 'weekly');

        $businessManagers = $this->em
            ->getRepository('DashboardBundle:User')
            ->findAll();

        $types = $this->em
            ->getRepository('DashboardBundle:DashboardEventType')
            ->findAll();

        return $this->prepareColumns($businessManagers, $events, $types, 'businessManager');
    }   
}