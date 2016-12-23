<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CvController extends Controller
{
    public function indexAction()
    {

            return $this->render('BlogGuigurFrontEndBundle:Default:CV.html.twig');
    }
}
