<?php

namespace GuigurFrontBundle\Service;

use Doctrine\ORM\EntityManager;
use GuigurFrontBundle\Entity\CatchPhrase;
use Symfony\Component\DependencyInjection\Container;

class CatchPhraseService
{
    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function requestCatchPhrase($type)
    {
        $catchPhrase = $this->em->getRepository('GuigurFrontBundle:CatchPhrase')->findByType($type);

        if (!$catchPhrase) {
            $nocatch = new CatchPhrase();
            $nocatch->setPhrase(":( Pas de catchphrase pour le type \"" . $type . "\"");
            return ($nocatch);
        }
        shuffle($catchPhrase);
        return ($catchPhrase[0]);
    }
}




