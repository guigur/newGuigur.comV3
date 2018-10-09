<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortfolioController extends Controller
{
    public function indexAction()
    {
        $page['header'] = "Le Portfolio";
        return $this->render('GuigurFrontBundle:Default:blog.html.twig', array("Page" => $page));
    }
}
