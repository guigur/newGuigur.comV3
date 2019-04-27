<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LinkShortenerController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuigurFrontBundle:Default:linkShortener.html.twig');
    }

    public function paramsAction()
    {
        return $this->render('GuigurFrontBundle:Default:about.html.twig');
    }
}
