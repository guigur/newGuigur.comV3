<?php

namespace GuigurFrontBundle\Service;

use Doctrine\ORM\EntityManager;
use GuigurFrontBundle\Entity\Login;
use Symfony\Component\DependencyInjection\Container;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine; // for Symfony 2.1.0+
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListenerService
{
    protected $em;
    protected $container;
    protected $userManager;

    public function __construct(EntityManager $entityManager, Container $container, UserManagerInterface $userManager)
    {
        $this->em = $entityManager;
        $this->container = $container;
        $this->userManager = $userManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();
        $userIP = $this->container->get('request_stack')->getCurrentRequest()->getClientIp();

        $login = new Login();
        $login->setDatetime(new \DateTime());
        $login->setIp($userIP);
        $login->setUser($user);
        $this->em->persist($login);
        $this->em->flush();
    }
}

