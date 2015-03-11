<?php

namespace Adneom\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Adneom\Bundle\DashboardBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class BusinessManagerController extends Controller
{
    public function listAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('DashboardBundle:User');

        $business_managers = $repository->findAll();

        return $this->render('DashboardBundle:Lists:businessunits.html.twig', array('business_managers' => $business_managers));
    }

    /**
    * Returns a JSON with the hits for a business manager
    * @param boolean $daily
    */
    public function hitsAction($daily){
        $data = $this->get('dashboard.business.event.manager')->countBusinessManagerHits($daily);

        $response = new JsonResponse();
        $response->setData($data);

        return $response;
    }

    
}