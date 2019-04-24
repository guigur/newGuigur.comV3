<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CvController extends Controller
{
    public function indexAction()
    {

        $cvContents = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:cvContent')
            ->findBy(array('isPublic' => 1));
            return $this->render('GuigurFrontBundle:Default:CV.html.twig', array("cvContents" => $cvContents));
    }
}
