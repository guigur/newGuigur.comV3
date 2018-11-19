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

    public function defaultImages($projects)
    {
        foreach ($projects as $project) //page avec plusieurs projets
            {
                $this->defaultImageProject($project);
            }
        return ($projects);
    }

    public function defaultImage($project)
    {
        $this->defaultImageProject($project);
        return ($project);
    }

    private function defaultImageProject($project)
    {
        if (!file_exists($project->getImgMiniature()) || $project->getImgMiniature() == "")
            $project->setImgMiniature("img/template_miniature.png");
        if (!file_exists($project->getImgProject()) || $project->getImgProject() == "")
            $project->setImgProject("img/template_img_project.png");
        return ($project);
    }
}
