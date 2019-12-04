<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HostingServiceController extends Controller
{
    public function indexAction($nameOfProject = null)
    {
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('hosting');

        $page['header'] = "Hosting serivce";
        return $this->render('GuigurFrontBundle:HostingService:hostingService.html.twig', array("Page" => $page, "Catchphrase" =>  $catchPhrase));
    }

    public function websitesAction()
    {
        $user = $this->getUser();
        $linksUser = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:LinkShortener')
            ->findByUser($user->getId());
        return $this->render('GuigurFrontBundle:HostingService:hostingServiceWebsites.html.twig', array("LinksUser" => $linksUser));
    }
}
