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

        foreach ($projects as $project) {
            echo '<pre>';
            var_dump($projects);
            echo '</pre>';
        }
        return $this->render('BlogGuigurFrontEndBundle:Default:index.html.twig', array("Projects" => $projects));
    }
}
