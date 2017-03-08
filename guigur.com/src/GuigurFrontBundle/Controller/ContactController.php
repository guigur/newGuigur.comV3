<?php

namespace GuigurFrontBundle\Controller;

use DateTime;
use GuigurFrontBundle\Entity\ContactForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuigurFrontBundle\Entity\CatchPhrase;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {

        $contactForm = new ContactForm();
        $form = $this->createFormBuilder($contactForm)
            ->add('name', TextType::class, array('label' => 'Pseudo'))
            ->add('mail', TextType::class, array('label' => 'Email'))
            ->add('content', TextareaType::class, array('label' => 'Votre requête', 'attr' => array('class' => 'contactTextarea', 'rows' => '6')))
            ->add('save', SubmitType::class, array('label' => 'Envoyer'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $contactForm = $form->getData();
            $contactForm->setDatetime(new datetime);
            $contactForm->setIP($this->get('request_stack')->getCurrentRequest()->getClientIp());
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactForm);
            $em->flush();
            return $this->redirectToRoute('Contact');
        }

        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('contact');
        return $this->render('GuigurFrontBundle:Default:contact.html.twig', array('form' => $form->createView(), "catchphrase" => $catchPhrase));
    }












}
