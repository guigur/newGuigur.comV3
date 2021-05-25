<?php

namespace GuigurFrontBundle\Controller;

use GuigurFrontBundle\Entity\Visits;
use Psr\Log\NullLogger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuigurFrontBundle\Entity\CatchPhrase;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $userIP = $this->container->get('request_stack')->getCurrentRequest()->getClientIp();
        $logNextVisit = false;

        $pastVisit = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Visits')
            ->findOneBy(array('ip' => $userIP));

            if ($pastVisit === null)
                $logNextVisit = true;
            else if ($pastVisit->getDatetime() < (new \DateTime('now'))->modify('-2 hours'))
                $logNextVisit = true;

        if ($logNextVisit == true)
        {
            $visit = new Visits();
            $visit->setIp($userIP);
            $visit->setDatetime(new \DateTime('now'));
            $visit->setIslogged(false);
            $entityManager->persist($visit);
            $entityManager->flush();
        }

        $projects = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Project')
            ->findBy(array('isEnabled' => 1, "featured" => 1));
        //->findByIsEnabled(1);

        $ProjectsCategories = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:ProjectsCategories')
            ->findBy(array(), array('category' => 'ASC'));

        $ProjectsNumbers = $this->getDoctrine()
            ->getRepository('GuigurFrontBundle:Project')
            ->findByIsEnabled(1);

        $ProjectsNumbers = count($ProjectsNumbers);
        $projects = $this->get('guigur.projects')->defaultImages($projects);
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('projects');
        $searchCatchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('search');

        return $this->render('GuigurFrontBundle:Default:index.html.twig',
            array("pastVisits" => $pastVisit,
                  "Catchphrase" =>  $catchPhrase,
                  "SearchCatchphrase" =>  $searchCatchPhrase,
                  "Projects" => $projects,
                  "ProjectsCategories" => $ProjectsCategories,
                  "ProjectsNumbers" => $ProjectsNumbers));
    }
}
