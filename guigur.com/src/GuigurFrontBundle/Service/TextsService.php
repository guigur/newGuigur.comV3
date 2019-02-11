<?php

namespace GuigurFrontBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class TextsService
{
    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function getText($name)
    {
        $text = $this->em
            ->getRepository('GuigurFrontBundle:Texts')
            ->findOneByName($name);

        if (!isset($text))
            $text = "empty";
        else
            $text = $text->getTextFr();

        return ($text);
    }


}
