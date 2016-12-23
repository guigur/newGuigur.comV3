<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function indexAction()
    {
        $type = "contact";
        $catchPhrase = $this->getDoctrine()
            ->getRepository('BlogGuigurFrontEndBundle:CatchPhrase')
            ->findAll($type);

        if (!$catchPhrase) {
            throw $this->createNotFoundException(
                'No product found for id '.$catchPhrase
            );
        }
        shuffle($catchPhrase);
        return $this->render('BlogGuigurFrontEndBundle:Default:contact.html.twig', array("catchphrase" =>  $catchPhrase[0]));
    }
}
