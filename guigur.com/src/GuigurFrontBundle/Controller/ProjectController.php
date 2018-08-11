<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
    public function indexAction($nameOfProject = null)
    {
        if ($nameOfProject)
        {
            $project = $this->getDoctrine()
                ->getRepository('GuigurFrontBundle:Project')
                ->findOneByName($nameOfProject);

            if (!$project)
                return $this->redirectToRoute('homepage');
            $project = $this->get('guigur.projects')->defaultImage($project);
            return $this->render('GuigurFrontBundle:Default:project.html.twig', array("Project" => $project));
        }
        else
        {
            $projects = $this->getDoctrine()
                ->getRepository('GuigurFrontBundle:Project')
                ->findByIsEnabled(1);

            $Categories = $this->getDoctrine()
                ->getRepository('GuigurFrontBundle:Categories')
                ->findAll();

            $ProjectsCategories = $this->getDoctrine()
                ->getRepository('GuigurFrontBundle:ProjectsCategories')
                ->findBy(array(), array('category' => 'ASC'));

            $projects = $this->get('guigur.projects')->defaultImage($projects);
            $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('projects');
            return $this->render('GuigurFrontBundle:Default:projects.html.twig', array("Catchphrase" =>  $catchPhrase, "Projects" => $projects, "Categories" => $Categories, "ProjectsCategories" => $ProjectsCategories));
        }


    }
}
