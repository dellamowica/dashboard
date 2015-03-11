<?php

namespace Adneom\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($daily)
    {
        return $this->render('DashboardBundle:Default:multigraph.html.twig', ['config' => [[
            'title' => 'Business unit',
            'route' => 'dashboard_business_unit_hits', 
            'isDaily' => $daily
        ],[
            'title' => 'Country', 
            'route' => 'dashboard_country_hits', 
            'isDaily' => $daily
        ],[
            'title' => 'Business Manager', 
            'route' => 'dashboard_business_manager_hits', 
            'isDaily' => $daily
        ]]]);
    }

    public function businessUnitAction($daily)
    {
        return $this->render('DashboardBundle:Default:graph.html.twig', [
            'title' => 'Business unit',
            'route' => 'dashboard_business_unit_hits', 
            'isDaily' => $daily
        ]);
    }

    public function countryAction($daily)
    {
        return $this->render('DashboardBundle:Default:graph.html.twig', [
            'title' => 'Country', 
            'route' => 'dashboard_country_hits', 
            'isDaily' => $daily
        ]);
    }

    public function businessManagerAction($daily)
    {
        return $this->render('DashboardBundle:Default:graph.html.twig', [
            'title' => 'Business Manager', 
            'route' => 'dashboard_business_manager_hits', 
            'isDaily' => $daily
        ]);
    }
}
