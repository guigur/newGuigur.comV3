<?php

namespace GuigurFrontBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class ImageCheckerService
{
    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function defaultImage($img, $type)
    {
        if (!file_exists($img))
        {
            switch ($type) {
                case "user":
                    $img = "img/defaults/user_default.png";
                    break;
                default:
                    $img = "img/defaults/absolute_default.png";
                    break;
            }
        }
        return ($img);
    }
}
