<?php
/**
 * Created by PhpStorm.
 * User: guigur
 * Date: 27/02/2021
 * Time: 00:34
 */

namespace GuigurAdminBundle\Service;
use Doctrine\Bundle\DoctrineBundle\Registry;
use http\Client\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;

class ProjectService
{
    private $doctrine;

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }


}