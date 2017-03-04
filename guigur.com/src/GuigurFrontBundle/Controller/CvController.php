<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CvController extends Controller
{
    public function indexAction()
    {

            return $this->render('GuigurFrontBundle:Default:CV.html.twig');
    }
}
