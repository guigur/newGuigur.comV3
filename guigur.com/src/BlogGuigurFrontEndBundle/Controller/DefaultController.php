<?php

namespace BlogGuigurFrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $projects = $this->getDoctrine()
            ->getRepository('BlogGuigurFrontEndBundle:Project')
            ->findAll("project");

        if (!$projects)
            throw $this->createNotFoundException('No product found for id '.$projects);

        foreach ($projects as $project)
        {
            if (!file_exists($project->getImgMiniature()))
                $project->setImgMiniature("img/template_miniature.png");
            if (!file_exists($project->getImgProject()))
                $project->setImgProject("img/template_img_project.png");
        }
        return $this->render('BlogGuigurFrontEndBundle:Default:index.html.twig', array("Projects" => $projects));
    }
}
