<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogGuigurFrontEndBundle\Entity\CatchPhrase;

class ContactController extends Controller
{
    public function requestCatchPhrase($type)
    {
        $catchPhrase = $this->getDoctrine()
            ->getRepository('BlogGuigurFrontEndBundle:CatchPhrase')
            ->findBy(array('type' => $type));

        if (!$catchPhrase) {
            $nocatch = new CatchPhrase();
            $nocatch->setPhrase(":( Pas de catchphrase pour le type \"" . $type . "\"");
            return ($nocatch);
        }
        shuffle($catchPhrase);
        return ($catchPhrase[0]);
    }

    public function indexAction()
    {
        return $this->render('BlogGuigurFrontEndBundle:Default:contact.html.twig', array("catchphrase" =>  $this->RequestCatchPhrase("contact")));
    }
}
