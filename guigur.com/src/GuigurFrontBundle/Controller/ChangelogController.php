<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuigurFrontBundle\Entity\CatchPhrase;

class ChangelogController extends Controller
{
    public function indexAction()
    {
        $Changelogs = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Changelogs')
            ->findAll();

        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('changelog');
        return $this->render('GuigurFrontBundle:Default:changelog.html.twig', array("Catchphrase" =>  $catchPhrase, "Changelogs" => $Changelogs));
    }
}
