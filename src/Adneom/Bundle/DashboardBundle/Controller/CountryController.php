<?php

namespace Adneom\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Adneom\Bundle\DashboardBundle\Entity\Country;
use Symfony\Component\HttpFoundation\Request;

class CountryController extends Controller
{
    public function listAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('DashboardBundle:Country');

        $countries = $repository->findAll();

        return $this->render('DashboardBundle:Lists:countries.html.twig', array('countries' => $countries));
    }

    /**
    * Returns a JSON with the hits for a business unit
    * @param boolean $weekly
    */
    public function hitsAction($weekly){
        $data = $this->get('dashboard.business.event.manager')->countCountryHits($weekly);

        $response = new JsonResponse();
        $response->setData($data);

        return $response;
    }
    
    /**
    * @param Country $country
    */
    public function editAction(Country $country, Request $request)
    {
        $form = $this->createFormBuilder($country)
                    ->add('name')
                    ->add('save','submit')
                    ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($form->getData());
            $em->flush();
            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );
            return $this->redirect( $this->generateUrl('dashboard_country_edit', array('country' => $country->getId())) );
        }
        return $this->render('DashboardBundle:Form:country.html.twig', array('form' => $form->createView()));
    }

    public function createAction(Request $request)
    {
        return $this->editAction(new Country, $request);
    }
}