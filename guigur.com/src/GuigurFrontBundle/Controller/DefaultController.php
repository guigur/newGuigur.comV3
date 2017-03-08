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
            ->findByIsEnabled(1);

        foreach ($projects as $project)
        {
            if (!file_exists($project->getImgMiniature()) && $project->getImgMiniature() != "none")
                $project->setImgMiniature("img/template_miniature.png");
            if (!file_exists($project->getImgProject()) && $project->getImgProject() != "none")
                $project->setImgProject("img/template_img_project.png");
        }

        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('projects');
        return $this->render('GuigurFrontBundle:Default:index.html.twig', array("Catchphrase" =>  $catchPhrase, "Projects" => $projects));
    }
}
