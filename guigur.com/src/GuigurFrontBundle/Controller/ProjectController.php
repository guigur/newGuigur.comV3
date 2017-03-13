<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
    public function indexAction($nameOfProject = null)
    {
        if ($nameOfProject)
        {
            $projects = $this->getDoctrine()
                ->getRepository('GuigurFrontBundle:Project')
                ->findOneByName($nameOfProject);

            if (!$projects)
            {
                return $this->redirectToRoute('homepage');
            }
            $projects = $this->get('guigur.projects')->defaultImage($projects);
            return $this->render('GuigurFrontBundle:Default:project.html.twig', array("Project" => $projects));
        }
        else
        {
            $projects = $this->getDoctrine()
                ->getRepository('GuigurFrontBundle:Project')
                ->findByIsEnabled(1);

            $projects = $this->get('guigur.projects')->defaultImage($projects);
            $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('projects');
            return $this->render('GuigurFrontBundle:Default:projects.html.twig', array("Catchphrase" =>  $catchPhrase, "Projects" => $projects));
        }


    }
}
