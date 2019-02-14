<?php

namespace GuigurAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $pastVisit = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Visits')
            ->findAll();

        $countVisitsDays = $this->get('guigur.admin.visits')->VisitsDays();
        $visitsStats = $this->get('guigur.admin.visits')->VisitsStats();
        return $this->render('GuigurAdminBundle:Default:index.html.twig', array("visitsDays" => $countVisitsDays, "visitsStats" => $visitsStats));
    }

    public function visitsAction()
    {
        $countVisitsDays = $this->get('guigur.admin.visits')->VisitsDays(360);
        return $this->render('GuigurAdminBundle:Default:visits.html.twig', array("visitsDays" => $countVisitsDays));
    }

    public function textsAction()
    {
        $texts = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Texts')
            ->findAll();

        return $this->render('GuigurAdminBundle:Default:texts.html.twig', array("Texts" => $texts));
    }

    public function sendFileAction($file)
    {
        $file_to_send = "Ressources/public/files/test.png";
        $response = new BinaryFileResponse($file_to_send);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, ".$file");
        return $response;
    }

    public function sendAction()
    {
        return $this->render('GuigurAdminBundle:Default:visits.html.twig', array("visitsDays" => $countVisitsDays));

    }

}
