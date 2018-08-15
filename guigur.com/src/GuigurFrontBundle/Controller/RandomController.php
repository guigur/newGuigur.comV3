<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuigurFrontBundle:Default:random.html.twig');
    }
}
