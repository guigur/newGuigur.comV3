<?php

namespace GuigurFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuigurFrontBundle\Entity\CatchPhrase;

class DefaultController extends Controller
{
    public function indexAction()
    {
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
        $projects = $this->get('guigur.projects')->defaultImage($projects);
        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('projects');
        return $this->render('GuigurFrontBundle:Default:index.html.twig', array("Catchphrase" =>  $catchPhrase, "Projects" => $projects, "ProjectsCategories" => $ProjectsCategories, "ProjectsNumbers" => $ProjectsNumbers));
    }
}
