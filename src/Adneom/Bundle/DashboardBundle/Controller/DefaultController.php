<?php

namespace Adneom\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($weekly)
    {
        return $this->render('DashboardBundle:Default:multigraph.html.twig', ['config' => [[
            'title' => 'Business unit',
            'route' => 'dashboard_business_unit_hits', 
            'isWeekly' => $weekly
        ],[
            'title' => 'Country', 
            'route' => 'dashboard_country_hits', 
            'isWeekly' => $weekly
        ],[
            'title' => 'Business Manager', 
            'route' => 'dashboard_business_manager_hits', 
            'isWeekly' => $weekly
        ]]]);
    }

    public function businessUnitAction($weekly)
    {
        return $this->render('DashboardBundle:Default:graph.html.twig', [
            'title' => 'Business unit',
            'route' => 'dashboard_business_unit_hits', 
            'isWeekly' => $weekly
        ]);
    }

    public function countryAction($weekly)
    {
        return $this->render('DashboardBundle:Default:graph.html.twig', [
            'title' => 'Country', 
            'route' => 'dashboard_country_hits', 
            'isWeekly' => $weekly
        ]);
    }

    public function businessManagerAction($weekly)
    {
        return $this->render('DashboardBundle:Default:graph.html.twig', [
            'title' => 'Business Manager', 
            'route' => 'dashboard_business_manager_hits', 
            'isWeekly' => $weekly
        ]);
    }
}
