<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrollController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuigurFrontBundle:Default:troll.html.twig');
    }
}
