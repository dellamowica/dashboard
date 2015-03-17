<?php

namespace Adneom\Bundle\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Adneom\Bundle\DashboardBundle\Entity\BusinessUnit;
use Symfony\Component\HttpFoundation\Request;

class BusinessUnitController extends Controller
{
    public function listAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('DashboardBundle:BusinessUnit');

        $business_units = $repository->findAll();

        return $this->render('DashboardBundle:Lists:businessunits.html.twig', array('business_units' => $business_units));
    }

    /**
    * Returns a JSON with the hits for a business unit
    * @param boolean $weekly
    */
    public function hitsAction($weekly){
        $data = $this->get('dashboard.business.event.manager')->countHits($weekly);

        $response = new JsonResponse();
        $response->setData($data);

        return $response;
    }

    /**
    * @param BusinessUnit $bu
    */
    public function editAction(BusinessUnit $bu, Request $request)
    {
        $form = $this->createFormBuilder($bu)
                    ->add('name')
                    ->add('country', 'entity', array('class'=>'Adneom\Bundle\DashboardBundle\Entity\Country'))
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
            return $this->redirect( $this->generateUrl('dashboard_business_unit_edit', array('bu' => $bu->getId())) );
        }
        return $this->render('DashboardBundle:Form:businessunit.html.twig', array('form' => $form->createView()));
    }

    public function createAction(Request $request)
    {
        return $this->editAction(new BusinessUnit, $request);
    }
}