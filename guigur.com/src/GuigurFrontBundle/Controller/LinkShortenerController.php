<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LinkShortenerController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuigurFrontBundle:Default:linkShortener.html.twig');
    }

    public function paramsAction($link)
    {
        $a = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:LinkShortener')
            ->findOneByLink($link);

        return $this->render('GuigurFrontBundle:Default:about.html.twig', array($a => "A"));
    }
}
