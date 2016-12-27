<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    private function RequestCatchPhrase($type)
    {
        $catchPhrase = $this->getDoctrine()
            ->getRepository('BlogGuigurFrontEndBundle:CatchPhrase')
            ->findAll($type);

        if (!$catchPhrase)
            throw $this->createNotFoundException('No product found for id '.$catchPhrase);
        shuffle($catchPhrase);
        return ($catchPhrase[0]);
    }

    public function indexAction()
    {
        return $this->render('BlogGuigurFrontEndBundle:Default:contact.html.twig', array("catchphrase" =>  $this->RequestCatchPhrase("contact")));
    }
}
