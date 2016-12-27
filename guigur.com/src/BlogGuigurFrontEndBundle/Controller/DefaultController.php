<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogGuigurFrontEndBundle\Entity\CatchPhrase;

class DefaultController extends Controller
{
    public function requestCatchPhrase($type)
    {
        $catchPhrase = $this->getDoctrine()
            ->getRepository('BlogGuigurFrontEndBundle:CatchPhrase')
            ->findBy(array('type' => $type));

        if (!$catchPhrase) {
            $nocatch = new CatchPhrase();
            $nocatch->setPhrase(":( Pas de catchphrase pour le type \"" . $type . "\"");
            return ($nocatch);
        }
        shuffle($catchPhrase);
        return ($catchPhrase[0]);
    }

    public function indexAction()
    {
        $projects = $this->getDoctrine()
            ->getRepository('BlogGuigurFrontEndBundle:Project')
            ->findAll("project");

        if (!$projects)
            throw $this->createNotFoundException('No product found for id '.$projects);

        foreach ($projects as $project)
        {
            if (!file_exists($project->getImgMiniature()) && $project->getImgMiniature() != "none")
                $project->setImgMiniature("img/template_miniature.png");
            if (!file_exists($project->getImgProject()) && $project->getImgProject() != "none")
                $project->setImgProject("img/template_img_project.png");
        }

        $catchPhrase = $this->requestCatchPhrase('projects');
        return $this->render('BlogGuigurFrontEndBundle:Default:index.html.twig', array("Catchphrase" =>  $catchPhrase, "Projects" => $projects));
    }
}
