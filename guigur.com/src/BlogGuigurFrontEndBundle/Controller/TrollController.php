<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrollController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogGuigurFrontEndBundle:Default:troll.html.twig');
    }
}
