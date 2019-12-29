<?php

namespace GuigurFrontBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Authentication\CustomAuthenticationFailureHandler;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;


class LocaleService implements EventSubscriberInterface
{
    protected $em;
    protected $container;
    protected $delfaultLocale;

    public function __construct($defaultLocale = 'en')
    {
        // EntityManager $entityManager, Container $container,
       // $this->em = $entityManager;
       // $this->container = $container;
        $this->defaultLocale = $defaultLocale;

    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession())
        {
            return;
        }

        // try to see if the locale has been set as a _locale routing parameter
        if ($locale = $request->attributes->get('_locale'))
        {
            $request->getSession()->set('_locale', $locale);
        }
        else
        {
            // if no explicit locale has been set on this request, use one from the session
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
    }

    public static function getSubscribedEvents()
    {
        // must be registered before (i.e. with a higher priority than) the default Locale listener
        return [ KernelEvents::REQUEST => [['onKernelRequest', 20]],];
    }
}

