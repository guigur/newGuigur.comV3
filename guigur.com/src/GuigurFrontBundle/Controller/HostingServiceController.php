<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HostingServiceController extends Controller
{
    public function indexAction($nameOfProject = null)
    {
        $archives = [];
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('archives');

        $page['header'] = "Les Archives";
        return $this->render('GuigurFrontBundle:Default:archives.html.twig', array("Page" => $page, "Catchphrase" =>  $catchPhrase, "Archives" => $archives));
    }
}
