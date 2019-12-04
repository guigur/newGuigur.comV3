<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BrandingController extends Controller
{
    public function indexAction()
    {
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('branding');
        $page['header'] = "Branding";
        $test = new \DateTime();
        return $this->render('GuigurFrontBundle:Default:branding.html.twig', array("Page" => $page, "Catchphrase" =>  $catchPhrase, "test" => $test));
    }
}
