<?php

namespace GuigurFrontBundle\Service;

use Doctrine\ORM\EntityManager;
use GuigurFrontBundle\Entity\Login;
use GuigurFrontBundle\Entity\LoginAttempts;
use Symfony\Component\DependencyInjection\Container;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine; // for Symfony 2.1.0+
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\Authentication\CustomAuthenticationFailureHandler;
use Symfony\Component\Validator\Constraints\DateTime;

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

    public function onSecurityAuthenticationFailure(AuthenticationFailureEvent $event)
    {
        $datetime = new \DateTime();
        $datetime = $datetime->format('Y-m-d H:i:s');

        $user = $event->getAuthenticationToken()->getUser();


        $file = 'test.txt';
        $content = $datetime.' '.$user.' AuthenticationFailureEvent succesfully failed !'.PHP_EOL;
        file_put_contents($file, $content, FILE_APPEND | LOCK_EX);

        $loginAttempt = new LoginAttempts();
        $loginAttempt->setUsername($user);
        $loginAttempt->setDatetime(new \DateTime());
        $loginAttempt->setPath("path");
        $loginAttempt->setType("fail");

        $this->em->persist($loginAttempt);
        $this->em->flush();
        /*
        $user = $event->getAuthenticationToken()->getUser();
        $userIP = $this->container->get('request_stack')->getCurrentRequest()->getClientIp();

        $login = new Login();
        $login->setDatetime(new \DateTime());
        $login->setIp($userIP);
        $login->setUser($user);
        $this->em->persist($login);
        $this->em->flush();
    */
    }
}

