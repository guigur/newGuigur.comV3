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
            ->findBy(array(), array('id' => 'DESC'));

        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('changelog');

        $page['header'] = "Changelog";
        return $this->render('GuigurFrontBundle:Default:changelog.html.twig', array("Page" => $page, "Catchphrase" =>  $catchPhrase, "Changelogs" => $Changelogs));
    }
}
