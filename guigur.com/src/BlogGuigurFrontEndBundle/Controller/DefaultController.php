<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        if ($ip == "127.0.0.1" || $ip == "127.0.0.3")
            return $this->render('BlogGuigurFrontEndBundle:Default:index.html.twig', array($ip => 'IP'));
        else
            return $this->render('BlogGuigurFrontEndBundle:Default:siteEnConstruction.html.twig', array($ip => 'IP'));
    }
}
