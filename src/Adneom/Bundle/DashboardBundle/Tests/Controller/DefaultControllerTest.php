<?php

namespace Adneom\Bundle\DashboardBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Adneom counter")')->count() > 0);
    }
    
    public function testBusinessUnit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/business/manager/graph');

        $this->assertTrue($crawler->filter('html:contains("Adneom counter")')->count() > 0);
    }
}
