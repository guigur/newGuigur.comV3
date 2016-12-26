<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogGuigurFrontEndBundle:Default:about.html.twig');
    }
}
