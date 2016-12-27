<?php

namespace BlogGuigurFrontEndBundle\Controller;

use BlogGuigurFrontEndBundle\Entity\CatchPhrase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    private function RequestCatchPhrase($type)
    {
        $catchPhrase = $this->getDoctrine()
            ->getRepository('BlogGuigurFrontEndBundle:CatchPhrase')
            ->findBy(array('type' => 'projects'));

        var_dump($catchPhrase);
        if (!$catchPhrase)
        {
            $nocatch = new CatchPhrase();
            $nocatch->setPhrase(":( Pas de catchphrase pour le type \"".$type."\"");
            return($nocatch);
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
            if (!file_exists($project->getImgMiniature()))
                $project->setImgMiniature("img/template_miniature.png");
            if (!file_exists($project->getImgProject()))
                $project->setImgProject("img/template_img_project.png");
        }
        return $this->render('BlogGuigurFrontEndBundle:Default:index.html.twig', array("Catchphrase" =>  $this->RequestCatchPhrase("projects"), "Projects" => $projects));
    }
}
