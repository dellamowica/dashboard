<?php

namespace Adneom\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountryController extends Controller
{
    public function listAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('DashboardBundle:Country');

        $countries = $repository->findAll();

        return $this->render('DashboardBundle:Lists:country.html.twig', array('countries' => $countries));
    }

    /**
    * Returns a JSON with the hits for a business unit
    * @param boolean $daily
    */
    public function hitsAction($daily){
        $data = $this->get('dashboard.business.event.manager')->countCountryHits($daily);

        $response = new JsonResponse();
        $response->setData($data);

        return $response;
    }
}