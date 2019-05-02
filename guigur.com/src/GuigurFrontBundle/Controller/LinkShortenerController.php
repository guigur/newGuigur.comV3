<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuigurFrontBundle\Entity\User;

class LinkShortenerController extends Controller
{
    public function indexAction()
    {
        $link = "test";

        $user = $this->getUser();
        //if ($user == NULL)

        $linksUser = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:LinkShortener')
            ->findByUser($user->getId());
        return $this->render('GuigurFrontBundle:Default:linkShortener.html.twig', array("LinksUser" => $linksUser));
    }

    public function paramsAction($link)
    {
        $a = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:LinkShortener')
            ->findOneByLink($link);

        return $this->render('GuigurFrontBundle:Default:about.html.twig', array("A" => $a));
    }
}
