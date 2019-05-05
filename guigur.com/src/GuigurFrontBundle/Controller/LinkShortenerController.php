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
            ->findOneBy(array('link' => $link));
        if($linkShortened != NULL)
        {
            return $this->redirect($linkShortened->getUrl());
        }
        else
        {
            $errorParam = "nolink";
            return $this->redirectToRoute('LinkShortenerError', ['errorParam' => $errorParam]);
        }
    }

    public function errorAction($errorParam)
    {
        $errorMsg = "";
        var_dump($errorParam);
        switch ($errorParam) {
            case "nolink":
                $errorMsg = "This link does not exist";
                break;
            default:
                $errorMsg = "There is no error here... Did you type this URL and hope to get some eater egg or something ?";
        echo $errorMsg;
        }
        return $this->render('GuigurFrontBundle:Default:linkShortenerErrors.html.twig', array("ErrorMessage" => $errorMsg));
    }
}
