<?php

namespace GuigurFrontBundle\Service;

use Doctrine\ORM\EntityManager;
use GuigurFrontBundle\Entity\CatchPhrase;
use Symfony\Component\DependencyInjection\Container;

class ProjectsService
{
    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function defaultImage($projects)
    {
        if (count($projects) == 1)
        {
            $projects = $this->defaultImageProject($projects);
        }
        else
        {
            foreach ($projects as $project)
            {
                $this->defaultImageProject($project);
            }
        }
        return ($projects);
    }

    private function defaultImageProject($project)
    {
        if (!file_exists($project->getImgMiniature()) && $project->getImgMiniature() != "none")
            $project->setImgMiniature("img/template_miniature.png");
        if (!file_exists($project->getImgProject()) && $project->getImgProject() != "none")
            $project->setImgProject("img/template_img_project.png");
        return ($project);
    }
}




