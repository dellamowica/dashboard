<?php

namespace Adneom\Bundle\DashboardBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BusinessEventRepository extends EntityRepository
{
    /**
    * Returns a list of events business unit and count
    * @param boolean $weekly Search for this week's hits
    * @return array
    */
    public function countBusinessUnitHits($weekly)
    {
        $builder = $this->createQueryBuilder('event')
            ->select('t.name as type','b.name as bu','count( distinct e ) as hits')
            ->from('DashboardBundle:DashboardEvent', 'e')
            ->join('e.user', 'u')
            ->join('u.business_unit', 'b')
            ->join('e.type', 't')
            ->groupBy('b.name','e.type');
        
        if(true === $weekly) {
            $builder->where('e.date BETWEEN :last_monday AND :current_date')
                    ->setParameter('last_monday',date('Y-m-d',strtotime( "previous monday")))
                    ->setParameter('current_date',date('Y-m-d H:i:s'));
        }

        $query = $builder->getQuery();

        return $query->getArrayResult();
    }

    
    /**
    * Returns a list of events business unit and count
    * @param boolean $weekly Search for this week's hits
    * @return array
    */
    public function countCountryHits($weekly)
    {
        $builder = $this->createQueryBuilder('event')
            ->select('t.name as type','c.name as country','count( distinct e ) as hits')
            ->from('DashboardBundle:DashboardEvent', 'e')
            ->join('e.user', 'u')
            ->join('u.business_unit', 'b')
            ->join('b.country', 'c')
            ->join('e.type', 't')
            ->groupBy('c.name','e.type');
        
        if(true === $weekly) {
            $builder->where('e.date BETWEEN :last_monday AND :current_date')
                    ->setParameter('last_monday',date('Y-m-d',strtotime( "previous monday")))
                    ->setParameter('current_date',date('Y-m-d H:i:s'));
        }

        $query = $builder->getQuery();

        return $query->getArrayResult();
    }
    
     /**
    * Returns a list of events BM  and count
    * @param boolean $weekly Search for this week's hits
    * @return array
    */
    public function countBusinessManagerHits($weekly)
    {
        $builder = $this->createQueryBuilder('event')
            ->select('t.name as type','CONCAT(CONCAT(u.lastname,\' \'), u.firstname) as businessManager','count( distinct e ) as hits')
            ->from('DashboardBundle:DashboardEvent', 'e')
            ->join('e.user', 'u')
            ->join('e.type', 't')
            ->groupBy('u.id','e.type');
        
        if(true === $weekly) {
            $builder->where('e.date BETWEEN :last_monday AND :current_date')
                    ->setParameter('last_monday',date('Y-m-d',strtotime( "previous monday")))
                    ->setParameter('current_date',date('Y-m-d H:i:s'));
        }

        $query = $builder->getQuery();

        return $query->getArrayResult();
    }
    
}