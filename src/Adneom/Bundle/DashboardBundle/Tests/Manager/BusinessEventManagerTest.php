<?php

namespace Adneom\Bundle\DashboardBundle\Tests\Manager;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Adneom\Bundle\DashboardBundle\Manager\BusinessEventManager;

/**
 * Description of BusinessEventManagerTest
 *
 * Unit tests for the Business Event Manager
 * 
 * @author clementdellamonica
 */
class BusinessEventManagerTest extends WebTestCase{
    public function testCounters()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        
        $manager = null;
        
        try {
            $manager = static::$kernel->getContainer()->get('dashboard.business.event.manager');
        } catch (\Exception $e) {
            
        }
        
        $this->assertTrue($manager instanceof BusinessEventManager);
        $this->assertInternalType('array',$manager->countHits());
        $this->assertInternalType('array',$manager->countHits(true));
    }
}
