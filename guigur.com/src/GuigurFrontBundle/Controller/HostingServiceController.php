<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HostingServiceController extends Controller
{
    public function indexAction($nameOfProject = null)
    {
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('hosting');

        $page['header'] = "Hosting serivce";
        return $this->render('GuigurFrontBundle:Default:hosting-service.html.twig', array("Page" => $page, "Catchphrase" =>  $catchPhrase));
    }
}
