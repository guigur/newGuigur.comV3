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
            ->add('name', TextType::class)
            ->add('mail', TextType::class)
            ->add('content', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $contactForm = $form->getData();
            $contactForm->setDatetime(new datetime);
            $contactForm->setIP('yes');
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactForm);
            $em->flush();
            return $this->redirectToRoute('Contact');
        }

        $catchPhrase = $this->get('guigur.catchphrase')->requestCatchPhrase('contact');
        return $this->render('GuigurFrontBundle:Default:contact.html.twig', array('form' => $form->createView(), "catchphrase" => $catchPhrase));
    }












}
