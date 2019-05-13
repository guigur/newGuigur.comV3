<?php

namespace GuigurFrontBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class ImageCheckerService
{
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
