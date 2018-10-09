<?php

namespace GuigurAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
