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
        /*
         * THE MEMORY PROBLEM IS RIGH HERE
        $pastVisit = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Visits')
            ->findAll();
      */
        /*
        $countVisitsDays = $this->get('guigur.admin.visits')->VisitsDays();
        $visitsStats = $this->get('guigur.admin.visits')->VisitsStats();
        $countLoginDays = $this->get('guigur.admin.login')->LoginDays();
        $loginStats = $this->get('guigur.admin.login')->LoginStats();
        $countRegisterDays = $this->get('guigur.admin.register')->RegisterDays();
        $registerStats = $this->get('guigur.admin.register')->RegisterStats();
        */
        $test = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Project')
            ->findAll();
        return $this->render('GuigurAdminBundle:Default:index.html.twig', array("test" => $test
            /*
            "visitsDays" => $countVisitsDays, "visitsStats" => $visitsStats,
            "loginDays" => $countLoginDays, "loginStats" => $loginStats,
            "registerDays" => $countRegisterDays, "registerStats" => $registerStats
*/));
    }

    public function visitsAction()
    {
        $countVisitsDays = $this->get('guigur.admin.visits')->VisitsDays(360);
        return $this->render('GuigurAdminBundle:Default:visits.html.twig', array("visitsDays" => $countVisitsDays));
    }

    public function loginAction()
    {
        $countLoginDays = $this->get('guigur.admin.login')->LoginDays(360);
        return $this->render('GuigurAdminBundle:Default:login.html.twig', array("loginDays" => $countLoginDays));
    }


    public function registerAction()
    {
        $countRegisterDays = $this->get('guigur.admin.register')->RegisterDays(360);
        return $this->render('GuigurAdminBundle:Default:register.html.twig', array("registerDays" => $countRegisterDays));
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
