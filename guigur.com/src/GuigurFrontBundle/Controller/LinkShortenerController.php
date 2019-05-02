<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuigurFrontBundle\Entity\User;

class LinkShortenerController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $linksUser = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:LinkShortener')
            ->findByUser($user->getId());
        return $this->render('GuigurFrontBundle:Default:linkShortener.html.twig', array("LinksUser" => $linksUser));
    }

    public function paramsAction($link)
    {
        $linkShortened = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:LinkShortener')
            ->findOneByLink($link);
    if($linkShortened != NULL)
        return $this->redirect($linkShortened->getUrl());
    else
        return $this->render('GuigurFrontBundle:Default:about.html.twig', array("A" => $url));
    }
}
